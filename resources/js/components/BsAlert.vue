<template>
    <div :class="`alert alert-${variant}`" v-bind="$attrs">
        <slot/>
    </div>
</template>

<script>
'use strict';

export default {
    name: 'BsAlert',
    props: {
        variant: {
            type: String,
            default: () => 'info'
        }
    }
};
</script>
