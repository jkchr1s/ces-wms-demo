'use strict';

/**
 * A wrapper for window.fetch that returns a Promise containing the JSON response.
 *
 * @param {String} url
 * @param {Object|null} options
 * @returns {Promise<any>}
 */
export function fetchJson(url, options = null) {
    return window.fetch(url, Object.assign(options || {}, {
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
        }
    }))
        .then(resp => {
            if (resp.status >= 200 && resp.status < 300) {
                return resp.json();
            }
            throw new Error(`Server returned status code ${resp.status} with message: ${resp.statusText}`);
        })
        .then(json => json)
        .catch(err => {
            // log to the console
            window.console && window.console.error && window.console.error(err);
            throw err;
        });
}

/**
 * Returns a Promise that contains the known movie genres once fulfilled.
 *
 * @returns {Promise<*>}
 */
export function getGenres() {
    return fetchJson('/api/genre');
}

/**
 * Returns a Promise that contains movie information for the specified genre.
 *
 * @param {Number} genreId
 * @param {Number|null} butNotId
 * @returns {Promise<*>}
 */
export function getMovieForGenre(genreId, butNotId) {
    return fetchJson(`/api/genre/${encodeURIComponent(genreId)}?not=${encodeURIComponent(butNotId || '')}`);
}

/**
 * Returns the TMDB user voting results.
 *
 * @param {Number} tmdbId
 * @returns {Promise<*>}
 */
export function getMovieVotes(tmdbId) {
    return fetchJson(`/api/tmdb/${encodeURIComponent(tmdbId)}`);
}
