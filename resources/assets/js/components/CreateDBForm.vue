<template>
    <!-- the submit event will no longer reload the page -->
    <form class="form-horizontal" id="createDB_Form" v-bind:action="uri" v-bind:method="method" @submit.prevent="CreateNewDBonSubmit_Event"  >
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name"
                       placeholder="Name" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCharset" class="col-sm-2 control-label">Charset</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputCharset" name="charset" required>
                    <option v-for="charset in charsets">{{ charset }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCollation" class="col-sm-2 control-label">Collation</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputCollation" name="collation" required>
                    <option v-for="collation in collations">{{ collation }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputOptions" class="col-sm-2 control-label">Options</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="inputOptions" name="options"
                          placeholder="CSV format with `;` separator accepted"></textarea>
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

            CreateNewDBonSubmit_Event: function (event) {

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
                    let formValues = [];
                    for (let v of formData.values())
                        formValues.push(v);

                    formValues.push("" +
                        "<a class='ctrlPanel' title='" + response.data.translates.getAllDBs_delete_db + "' id='deleteDB' href='" + response.data.urls.editDB + "'><i class='fa fa-trash'></i></a>" +
                        "<a class='ctrlPanel' title='" + response.data.translates.getAllDBs_edit_db + "' id='editDB' href='" + response.data.urls.deleteDB + "'><i class='fa fa-pencil-square'></i></a>" +
                        "<a class='ctrlPanel' title='" + response.data.translates.getAllDBs_tables_of_db + "' id='gotoTbl' href='" + response.data.urls.DBtables + "'><i class='fa fa-table'></i></a>" +
                        "<a class='ctrlPanel' title='" + response.data.translates.getAllDBs_edit_cache_of_db + "' id='DBcache' href='" + response.data.urls.cacheSettings + "'><i class='fa fa-archive'></i></a>" +
                    "");

                    $('#DataBaseAllLists').DataTable().row.add(formValues).draw(false);
                    event.target.reset();
                    $("#submitData").button('complete');
                    alert("Success");
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