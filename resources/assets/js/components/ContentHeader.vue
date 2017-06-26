<template>
    <!-- TODO Translation -->
    <section class="content-header">
        <h1>
            <slot></slot>
        </h1>

        <slot name="breadcrumbs"></slot>

    </section>

</template>

<script>
    export default {
        props: {
            breadcrumbs: {
                type: Boolean,
                required: false,
                default: false
            }
        }
    }
</script>
