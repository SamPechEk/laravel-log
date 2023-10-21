<template>
    <div>
        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage">
        </bootstrap-4-datatable>
        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
    </div>
</template>

<script>
export default {
    props: ["rows"],
    data(){
        return{
                columns:[
                {
                    label:'Estado',
                    field:'nombre'
                },
                {
                    label:'Casos',
                    field:'totalCasos'
                }
            ],
            page:1,
            filter:'',
            perPage:10
        }
    }
}

</script>