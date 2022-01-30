<template>
    <div class="card">
        <div class="card-header" v-if="title">
            {{ title }}
        </div>
        <div class="card-body">
            <slot/>
        </div>
    </div>
</template>

<script>
'use strict';

export default {
    name: 'BsCard',
    props: {
        title: {
            type: String,
            default: null
        }
    }
}
</script>
