<template>
<div>
    <v-data-table
        :headers='headers'
        :items='items'
    ></v-data-table>
</div>
</template>

<script>
export default {
    data() {
        return {
            header: [
                {text: 'Category', align: 'start', value: ''},
                {text: 'Classificateion', value: ''},
                {text: 'Region', value: ''},

            ],
            items: []
        }
    },
    mounted() {
        axios.get('/api/master/getList', {
            // 
        }).then(res => {
            this.items = res.data;
        })
    }
}
</script>