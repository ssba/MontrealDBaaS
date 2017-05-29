<template>
    <!-- TODO Translation -->
    <form class="form-horizontal" id="createDB_Form" v-bind:action="uri" v-bind:method="method" @submit.prevent="CreateNewTableonSubmit_Event"  >
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
                <input type="text" class="form-control" id="inputCharset" name="charset" v-bind:value="charset"
                       placeholder="Charset" required readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCollation" class="col-sm-2 control-label">Collation</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCollation" name="collation" v-bind:value="collation"
                       placeholder="Collation" required readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputComment" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputComment" name="comment"
                       placeholder="Comment for table" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCache" class="col-sm-2 control-label">Cache</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCache" name="cache"
                       placeholder="600">
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
            },
            charset: {
                type: String,
                required: true,
                default: 'utf8'
            },
            collation: {
                type: String,
                required: true,
                default: 'utf8_general_ci'
            }
        },
        methods: {

            CreateNewTableonSubmit_Event: function (event) {

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

                    console.log(formData);

                    let formValues = [];
                    for (let v of formData.values())
                        formValues.push(v);


                    formValues.push(response.data.meta.updated_at);
                    formValues.push(response.data.meta.created_at);


                    formValues.push("" +
                        "<a class='ctrlPanel' title='" + response.data.translates.delete_table + "' id='deleteTable' href='#' data-toggle='modal' data-target='#confirm-delete' data-href='" + response.data.urls.deleteTable + "'><i class='fa fa-trash'></i></a> " +
                        "<a class='ctrlPanel' title='" + response.data.translates.edit_table + "' id='editTable' href='" + response.data.urls.editTable + "'><i class='fa fa-pencil-square'></i></a> " +
                        "<a class='ctrlPanel' title='" + response.data.translates.tables_rows + "' id='gotoRows' href='" + response.data.urls.DTRows + "'><i class='fa fa-empire'></i></a> " +
                    "");

                    $('#TablesLists').DataTable().row.add(formValues).draw(false);

                    $(event.target).find("input#inputName").val('');
                    $(event.target).find("input#inputComment").val('');
                    $(event.target).find("input#inputCache").val('');

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