<template>
    <!-- TODO Translation -->
    <form class="form-horizontal" id="createDB_Form" v-bind:action="uri" v-bind:method="method" @submit.prevent="EditDBonSubmit_Event"  >
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label" >Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" :value="name"
                       placeholder="Name" required disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCharset" class="col-sm-2 control-label">Charset</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputCharset" name="charset" required>
                    <option v-for="_charset in charsets" :selected=" (charset == _charset) ? 'true' : 'false'  " autofocus>{{ _charset }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCollation" class="col-sm-2 control-label">Collation</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputCollation" name="collation" required>
                    <option v-for="_collation in collations" :selected=" (collation == _collation) ? 'true' : 'false'  " >{{ _collation }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputOptions" class="col-sm-2 control-label">Options</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="inputOptions" name="options"
                          placeholder="CSV format with `;` separator accepted">{{ options }}</textarea>
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

            charset: {
                type: String,
                required: true
            },
            collation: {
                type: String,
                required: true
            },
            options: {
                type: String,
                required: true
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
        data: function () {
            return {
                charsets : Object.keys(window.DBCharsets),
                collations : window.DBCharsets['utf8']
            }
        },
        methods: {

            EditDBonSubmit_Event: function (event) {

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