<template>
    <div class="row">
        <div class="col-12 col-lg-3">
            <form @submit.prevent.capture="handleSubmit">
                <div v-show="genres.length" class="mb-3 col-auto">
                    <label for="genre_id" class="form-label">Genre:</label>
                    <select v-model="genre" class="form-select" id="genre_id" required>
                        <option value="">Select a genre...</option>
                        <option v-for="(val, idx) in genres" :key="`genre-${idx}`" :value="val.id">{{ val.name }}</option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit" :disabled="loading">
                    Submit
                </button>
            </form>
        </div>
        <div class="col-12 col-lg-9">
            <bs-modal id="votes-modal" :title="`User Reviews for ${movie && movie.name}`">
                <p v-if="votes">
                    {{ votes.name }} earned a score of {{ votes.vote_average }} based on poll results from
                    {{ votes.vote_count }} reviewers.
                </p>
                <p v-else class="text-muted">
                    Loading results from
                    <a href="https://www.themoviedb.org/">TMDB...</a>
                </p>
            </bs-modal>

            <div v-show="!movie && !loading">
                <h3>🤔 Can't decide on a movie to watch?</h3>
                <p class="lead">
                    Introducing the CES-WMS movie recommendation engine!
                </p>
                <bs-alert>
                    Select the genre you're in the mood to watch and let our algorithm go to work for you!
                </bs-alert>
            </div>

            <div v-if="movie" class="w-100">
                <h3><a :href="movie.info_url" target="_new" title="See on Rotten Tomatoes">{{ movie.name }}</a></h3>
                <span class="badge bg-secondary">{{ movie.rating.name }}</span>
                <span class="small text-muted">
                    Released <em>{{ movie.release_year }}</em>
                    <button type="button" class="btn btn-link pb-1 ps-0 pe-0 pt-0" data-bs-toggle="modal" data-bs-target="#votes-modal" @click="handleRequestVotes">
                        see user review scores from theMovieDB
                    </button>
                </span>

                <p class="lead mt-3">
                    {{ movie.critic_notes }}
                    <br>
                    <span class="small text-muted">&mdash; Rotten Tomatoes</span>
                </p>

                <img style="width: 100%; max-width: 100%" :src="movie.img_url">
                <span class="small">Image sourced from Rotten Tomatoes.</span>
            </div>
        </div>
    </div>
</template>

<script>
'use strict';
import {getGenres, getMovieForGenre, getMovieVotes} from "../datalib";
import BsAlert from './BsAlert.vue';
import BsModal from './BsModal.vue';

export default {
    name: 'GenreSelect',
    components: {BsAlert, BsModal},
    data() {
        return {
            genres: [],
            loading: false,
            genre: '',
            lastGenre: '',
            movie: null,
            votes: null
        };
    },
    methods: {
        handleRequestVotes() {
            if (!this.movie || !this.movie.tmdb_id) {
                return;
            }
            return getMovieVotes(this.movie.tmdb_id)
                .then(json => {
                    this.votes = json;
                })
                .catch(err => {
                    window.alert(err.message);
                });
        },
        handleSubmit() {
            this.votes = null;
            const lastMovie = this.movie && this.genre === this.lastGenre && this.movie.id || null;
            this.movie = null;
            this.loading = true;
            return getMovieForGenre(this.genre, lastMovie)
                .then(json => {
                    this.lastGenre = this.genre;
                    this.loading = false;
                    this.movie = json;
                })
                .catch(err => {
                    this.loading = false;
                    window.alert(err.message);
                });
        }
    },
    mounted() {
        this.loading = true;
        getGenres()
            .then(json => {
                if (!Array.isArray(json)) {
                    return;
                }
                json.forEach(genre => {
                    this.genres.push(genre);
                });
                this.loading = false;
            })
            .catch(err => {
                this.loading = false;
                window.alert(err.message);
            });
    }
}
</script>
