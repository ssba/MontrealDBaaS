<template>
    <!-- TODO Translation -->
    <section class="content-header">
        <h1>
            <slot></slot>
        </h1>
        <ol class="breadcrumb" v-if="breadcrumbs">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">404 error</li>
        </ol>
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
