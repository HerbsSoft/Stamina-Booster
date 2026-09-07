/**
 * Ayurvedic Health Pre-Lander - Advanced UTM & Ad Parameter Redirection Engine
 * Handles age quiz selection, URL parameter preservation, UTM tagging, and redirection to https://vedartha.in/v2.html
 */

(function () {
  'use strict';

  // Global configuration (customizable via window.VEDARTHA_CONFIG)
  const CONFIG = Object.assign(
    {
      baseUrl: 'https://vedartha.in/v2.html',
      defaultUtmSource: 'prelander_quiz',
      defaultUtmMedium: 'cpc',
      defaultUtmCampaign: 'vedartha_v2',
      preserveAllIncomingParams: true,
      directRedirectOnSelect: false, // If true, clicking radio redirects immediately; if false, redirects on CTA button click
      redirectDelayMs: 220 // Smooth UX feedback delay before page transition
    },
    window.VEDARTHA_CONFIG || {}
  );

  // Age group definitions & UTM mapping
  const AGE_MAP = {
    '25-30': {
      raw: '25-30',
      label: '25 से 30',
      utmContent: 'age_25-30',
      utmTerm: 'age_25_30_years',
      ageParam: '25-30'
    },
    '30-45': {
      raw: '30-45',
      label: '30 से 45',
      utmContent: 'age_30-45',
      utmTerm: 'age_30_45_years',
      ageParam: '30-45'
    },
    '45-60plus': {
      raw: '45-60plus',
      label: '45 से 60+',
      utmContent: 'age_45-60plus',
      utmTerm: 'age_45_60plus_years',
      ageParam: '45-60+'
    }
  };

  /**
   * Parse current page search query parameters into a key-value object
   */
  function getIncomingParams() {
    try {
      const search = window.location.search;
      if (!search) return {};
      const params = {};
      const urlParams = new URLSearchParams(search);
      for (const [key, val] of urlParams.entries()) {
        if (key && val) {
          params[key] = val;
        }
      }
      return params;
    } catch (e) {
      console.warn('[Vedartha Lander] Could not parse query params:', e);
      return {};
    }
  }

  /**
   * Build the final destination URL with properly encoded UTM & tracking parameters
   * @param {string} ageKey - The selected age key ('25-30', '30-45', or '45-60plus')
   * @returns {string} Final encoded redirection URL
   */
  function buildDestinationUrl(ageKey) {
    const ageData = AGE_MAP[ageKey] || AGE_MAP['45-60plus'];
    const incoming = getIncomingParams();

    let destUrl;
    try {
      destUrl = new URL(CONFIG.baseUrl);
    } catch (e) {
      destUrl = new URL(CONFIG.baseUrl, window.location.origin);
    }

    const searchParams = destUrl.searchParams;

    // 1. Preserve all incoming parameters (fbclid, gclid, ttclid, utm_*, ad_id, pixel_id, etc.)
    if (CONFIG.preserveAllIncomingParams) {
      for (const [key, value] of Object.entries(incoming)) {
        searchParams.set(key, value);
      }
    }

    // 2. Set default UTM source if not present
    if (!searchParams.has('utm_source')) {
      searchParams.set('utm_source', CONFIG.defaultUtmSource);
    }

    // 3. Set default UTM medium if not present
    if (!searchParams.has('utm_medium')) {
      searchParams.set('utm_medium', CONFIG.defaultUtmMedium);
    }

    // 4. Set default UTM campaign if not present
    if (!searchParams.has('utm_campaign')) {
      searchParams.set('utm_campaign', CONFIG.defaultUtmCampaign);
    }

    // 5. Append or enhance UTM Content with Age Selection
    const existingContent = searchParams.get('utm_content');
    if (existingContent) {
      if (!existingContent.includes(ageData.utmContent)) {
        searchParams.set('utm_content', `${existingContent}_${ageData.utmContent}`);
      }
    } else {
      searchParams.set('utm_content', ageData.utmContent);
    }

    // 6. Set UTM Term with Age info if not present
    if (!searchParams.has('utm_term')) {
      searchParams.set('utm_term', ageData.utmTerm);
    }

    // 7. Explicit Age & Quiz parameters
    searchParams.set('age', ageData.ageParam);
    searchParams.set('quiz_step', 'age_completed');
    searchParams.set('v_src', 'prelander_v1');

    return destUrl.toString();
  }

  /**
   * Initialize interactive elements on DOM Ready
   */
  function initLander() {
    const radioInputs = document.querySelectorAll('input[name="user_age"]');
    const radioLabels = document.querySelectorAll('.age-radio-label');
    const ctaButton = document.getElementById('cta-submit-btn') || document.getElementById('cta-redirect-link') || document.querySelector('.cta-button');
    const form = document.getElementById('age-quiz-form');
    const debugUrlDisplay = document.getElementById('debug-final-url');
    const debugAgeDisplay = document.getElementById('debug-selected-age');
    const debugUtmDisplay = document.getElementById('debug-utm-content');
    const yearDisplay = document.getElementById('copyright-year');

    // Dynamic copyright year
    if (yearDisplay) {
      yearDisplay.textContent = new Date().getFullYear();
    }

    // Get currently checked age value
    function getSelectedAge() {
      const checked = document.querySelector('input[name="user_age"]:checked');
      return checked ? checked.value : '45-60plus';
    }

    // Update UI active styles and update button link/debug preview
    function updateState(selectedAgeKey) {
      const ageData = AGE_MAP[selectedAgeKey] || AGE_MAP['45-60plus'];
      const finalUrl = buildDestinationUrl(selectedAgeKey);

      // Update active classes on radio labels
      radioLabels.forEach((label) => {
        const input = label.querySelector('input[type="radio"]');
        if (input && input.value === selectedAgeKey) {
          label.classList.add('selected');
          input.checked = true;
        } else {
          label.classList.remove('selected');
        }
      });

      // Update CTA anchor href
      if (ctaButton && ctaButton.tagName === 'A') {
        ctaButton.href = finalUrl;
      }

      // Update form action
      if (form) {
        form.action = finalUrl;
      }

      // Update debugger panel if present
      if (debugUrlDisplay) {
        debugUrlDisplay.textContent = finalUrl;
      }
      if (debugAgeDisplay) {
        debugAgeDisplay.textContent = ageData.label + ` (${selectedAgeKey})`;
      }
      if (debugUtmDisplay) {
        debugUtmDisplay.textContent = ageData.utmContent;
      }
    }

    // Trigger redirection
    function executeRedirect(ageKey) {
      const finalUrl = buildDestinationUrl(ageKey);

      if (ctaButton) {
        ctaButton.classList.add('loading');
        ctaButton.innerHTML = `<span class="spinner"></span> <span>लोड हो रहा है...</span>`;
      }

      setTimeout(() => {
        window.location.href = finalUrl;
      }, CONFIG.redirectDelayMs);
    }

    // Radio change listeners
    radioInputs.forEach((input) => {
      input.addEventListener('change', (e) => {
        const selectedAge = e.target.value;
        updateState(selectedAge);

        if (CONFIG.directRedirectOnSelect) {
          executeRedirect(selectedAge);
        }
      });
    });

    // Make entire label clickable
    radioLabels.forEach((label) => {
      label.addEventListener('click', function (e) {
        // Prevent double event if clicking direct input
        if (e.target.tagName !== 'INPUT') {
          const input = this.querySelector('input[type="radio"]');
          if (input) {
            input.checked = true;
            updateState(input.value);

            if (CONFIG.directRedirectOnSelect) {
              executeRedirect(input.value);
            }
          }
        }
      });
    });

    // CTA Button Click listener
    if (ctaButton) {
      ctaButton.addEventListener('click', (e) => {
        e.preventDefault();
        const selectedAge = getSelectedAge();
        executeRedirect(selectedAge);
      });
    }

    // Initial state calculation
    const initialAge = getSelectedAge();
    updateState(initialAge);

    // Expose helpers to global scope for testing/monitoring
    window.VedarthaQuiz = {
      buildUrl: buildDestinationUrl,
      getSelectedAge: getSelectedAge,
      updateState: updateState,
      executeRedirect: executeRedirect,
      config: CONFIG
    };
  }

  // Initialize on load
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLander);
  } else {
    initLander();
  }
})();
