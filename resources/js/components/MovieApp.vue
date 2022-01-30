<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <!-- Render a card to display the movie selector -->
                <bs-card title="Movie Recommendation">
                    <genre-select/>
                </bs-card>
            </div>
        </div>
    </div>
</template>

<script>
'use strict';
import BsAlert from '../components/BsAlert.vue';
import BsCard from '../components/BsCard.vue';
import GenreSelect from '../components/GenreSelect.vue';

export default {
    name: 'MovieApp',
    components: {BsAlert, BsCard, GenreSelect}
};
</script>
