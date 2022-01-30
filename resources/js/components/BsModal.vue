<template>
    <div class="modal fade" :id="id" tabindex="-1" :aria-labelledby="`${id}-label`" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="`${id}-label`">{{ title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <slot/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
'use strict';

export default {
    name: 'BsModal',
    props: {
        id: {
            type: String
        },
        title: {
            type: String
        }
    }
}
</script>
