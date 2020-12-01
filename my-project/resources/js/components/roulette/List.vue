<template>
<v-app>
    <div style="margin: 20px;">
        <p style="font-size:20px;">Toronto Roulette!!</p>
        <hr style="color: #808080;">
    </div>
    <div style="margin: 20px;">
        <v-row>
            <v-col
                cols=8
            >
                <v-dialog
                    v-model="createDialog"
                    persistent
                    max-width="500"
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            color="primary"
                            dark
                            v-bind="attrs"
                            v-on="on"
                        >
                         <v-icon>mdi-account</v-icon>
                        Add Element
                        </v-btn>
                    </template>
                    <v-card style="overflow: hidden;">
                        <p>Do you add a new element?</p>
                        <v-text-field
                            v-model="addElement"
                            label="elemet"
                            placeholder="test"
                            outlined
                        ></v-text-field>
                        <v-select
                            v-model="selectedStatus"
                            :items="selectStatus"
                            itemText="status"
                            label="status"
                            placeholder="Choose Status"
                            outlined
                        ></v-select>
                        <v-btn
                            outlined
                            color="indigo"
                            @click="createDialog = false"
                        >Cancel</v-btn>
                        <v-btn
                            color="indigo"
                            class="white--text"
                            @click="create"
                        >Create</v-btn>
                    </v-card>
                </v-dialog>
                <v-snackbar
                    v-model="createSuccess"
                >
                    Created Element!!
                <template v-slot:action="{ attrs }">
                    <v-btn
                        color="white"
                        text
                        v-bind="attrs"
                        @click="createSuccess = false"
                    >
                        ×
                    </v-btn>
                </template>
                </v-snackbar>
            </v-col>
            <v-col cols=4>
                <v-pagination v-model="page" :length="pageCount"></v-pagination>
            </v-col>
        </v-row>
        <v-data-table
            :headers="headers"
            :items="slotItems"
            :page.sync="page"
            :items-per-page="itemPerPage"
            style="font-size: 16px;"
            class="elevation-1"
            hide-default-footer
            @page-count="pageCount = $event"
        >
            <template v-slot:item.actions="{ item }">
                <v-icon
                    @click="editFlg(item)"
                >
                    mdi-pencil
                </v-icon>
                <v-icon
                    @click="delFlg(item)"
                >
                    mdi-delete
                </v-icon>
            </template>
            <template v-slot:no-data>
                <p style="color: #ff6347;">{{ message }}</p>
            </template>
        </v-data-table>
        <v-dialog
            v-model="editDialog"
            persistent
            max-width="500"
        >
            <v-card>
                <p>Do you edit the selected element?</p>
                <p style="border: solid 2px #EDEDED">Selected Element : {{ editElement }}</p>
                <v-text-field
                    v-model="editElement"
                    label="elemet"
                    placeholder="test"
                    outlined
                ></v-text-field>
                <v-select
                    v-model="selectedStatus"
                    :items="selectStatus"
                    itemText="status"
                    label="status"
                    placeholder="Choose Status"
                    outlined
                ></v-select>
                <v-btn
                    outlined
                    color="indigo"
                    @click="editDialog = false"
                >Cancel</v-btn>
                <v-btn
                    color="indigo"
                    class="white--text"
                    @click="edit"
                >Edit</v-btn>
            </v-card>
        </v-dialog>
        <v-snackbar
            v-model="editSuccess"
        >
            Edited seuccessfully!!
            <template v-slot:action="{ attrs }">
                <v-btn
                    color="white"
                    text
                    v-bind="attrs"
                    @click="createSuccess = false"
                >
                    ×
                </v-btn>
            </template>
        </v-snackbar>
        <v-dialog
            v-model="delDialog"
            persistent
            max-width="500"
        >
            <v-card>
                <p>Are you sure you want to delete the selected element?</p>
                <p  style="border: solid 2px #EDEDED">Selected Element : {{ selectedElement }}</p>
                <v-btn
                    outlined
                    color="error"
                    @click="delDialog = false"
                >Cancel</v-btn>
                <v-btn
                    color="error"
                    class="white--text"
                    @click="del"
                >Delete</v-btn>
            </v-card>
        </v-dialog>
        <v-snackbar
            v-model="delSuccess"
        >
            Deleted seuccessfully!!
            <template v-slot:action="{ attrs }">
                <v-btn
                    color="white"
                    text
                    v-bind="attrs"
                    @click="delSuccess = false"
                >
                    ×
                </v-btn>
            </template>
        </v-snackbar>
        <v-dialog
            v-model="runDialog"
            persistent
            style="overflow: hidden;"
            max-width="500"
        >
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    v-bind="attrs"
                    v-on="on"
                    @click="run"
                >
                    Run Roulette
                </v-btn>
            </template>
            <v-card style="overflow: hidden;">
                <v-row>
                    <v-col align="center">
                        <p>RESULT</p>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <p>{{ result.element }}</p>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        <v-btn
                            color="indigo"
                            class="white--text"
                            @click="clearResult"
                    >OK</v-btn>
                    </v-col>
                </v-row>
            </v-card>
        </v-dialog>
    </div>
</v-app>
</template>

<script>
export default {
    data() {
        return {
            headers: [
                {text: "", align: "start", value: "id", class: "blue-grey darken-1"},
                {text: "element", value: "element", class: "white--text blue-grey darken-1"},
                {text: "status", value: "status", class: "white--text blue-grey darken-1"},
                {text: "actions", value: "actions", class: "white--text blue-grey darken-1"},
            ],
            slotItems:[],
            selectStatus:[
                {value: 1, status: 'enable'},
                {value: 2, status: 'disable'}
            ],
            page: 1,
            pageCount: 0,
            itemPerPage: 5,
            addElement:"",
            createDialog: false,
            createSuccess: false,
            status: "",
            editDialog: false,
            delDialog: false,
            editElement: "",
            editStatus: "",
            editSuccess: false,
            delSuccess: false,
            selectedId:"",
            message: "",
            runDialog: "",
            result: "",
            selectedStatus: "",
            selectedElement: ""
        }
    },
    mounted() {
        this.search();
    },
    methods: {
        search() {
            axios
                .get('/api/slots')
                .then(res => {
                    if(res.data.length === 0) {
                        this.message = "No Data";
                    }
                    this.slotItems = res.data;
                })
        },
        create() {
            if(this.selectedStatus === 1) {
                this.status = "enable";
            } else {
                this.status = "disable";
            }
            console.log(this.status)

            axios
                .post('/api/slot/create', {
                    element: this.addElement,
                    status: this.status
                })
                .then(res => {
                    console.log(this.addElement)
                    this.createDialog = false;
                    this.createSuccess = true;
                    this.addElement = "";
                    this.status = "";
                    this.selectStatus = "";
                    this.search();
                })
        },
        edit() {
            if(this.selectedStatus === 1) {
                this.status = "enable";
            } else {
                this.status = "disable";
            }

            axios
                .post('/api/slot/edit', {
                    id: this.selectedId,
                    element: this.editElement,
                    status: this.status
                })
                .then(res => {
                    console.log(this.addElement)
                    this.editDialog = false;
                    this.editSuccess = true;
                    this.selectedId = "";
                    this.editElement = "";
                    this.status = "";
                    this.selectedStatus = "";
                    this.search();
                })
        },
        editFlg(item) {
            console.log(item)
            this.editDialog = true;
            this.selectedId = item.id;
            this.editElement = item.element;
            if(item.status === "enable") {
                this.selectedStatus = 1;
            } else {
                this.selectedStatus = 2;
            }
        },
        delFlg(item) {
            console.log(item.id)
            this.delDialog = true;
            this.selectedId = item.id;
            this.selectedElement = item.element;
        },
        del() {
            axios
                .post('/api/slot/delete', {
                    id: this.selectedId
                })
                .then(res => {
                    if(res.data) {
                        this.delDialog = false;
                        this.delSuccess = true;
                        this.search();
                    }
                })
        },
        run() {
            this.runDialog = true;

            axios
                .get('/api/slot/run')
                .then(res => {
                    this.result =res.data;
                })
        },
        clearResult() {
            this.result = "";
            this.runDialog = false;
        }
    }
}
</script>
