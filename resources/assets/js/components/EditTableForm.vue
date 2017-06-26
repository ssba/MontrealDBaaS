<template>
    <!-- TODO Translation -->
    <form class="form-horizontal" id="editDataTable_Form" v-bind:action="uri" v-bind:method="method" @submit.prevent="EditTableOnSubmit_Event"  >
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label" >Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" :value="name"
                       placeholder="Name" required >
            </div>
        </div>
        <div class="form-group">
            <label for="inputComment" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputComment" name="comment" :value="comment"
                       placeholder="Comment" required >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCache" class="col-sm-2 control-label">Cache</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCache" name="cache" :value="cache"
                       placeholder="Cache" required >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <button type="submit" id="submitData"
                        data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading..."
                        data-complete-text="Created"
                        class="btn btn-lg btn-primary btn-block">Create</button>
            </div>
        </div>
    </form>


</template>

<script>
    export default {
        props: {

            comment: {
                type: String,
                required: false,
                default: ''
            },
            cache: {
                type: String,
                required: false,
                default: 0
            },
            name: {
                type: String,
                required: true
            },
            uri: {
                type: String,
                required: true,
                default: '/'
            },
            method: {
                type: String,
                required: true,
                default: 'get'
            }
        },
        methods: {

            EditTableOnSubmit_Event: function (event) {

                Pace.restart();

                $("#submitData").button('loading');
                let formURI = event.target.action;
                let formMethod = event.target.method;
                let formData = new FormData(event.target);

                axios({
                    method:formMethod,
                    url:formURI,
                    data:formData
                })
                    .then(function (response) {
                        event.target.reset();
                        $("#submitData").button('complete');
                        alert("Saved");
                    })
                    .catch(function (error) {
                        $("#submitData").button('reset');
                        alert(error);
                    });

            }
        },
        mounted() {
            //console.log(this.data);
        }
    }
</script>