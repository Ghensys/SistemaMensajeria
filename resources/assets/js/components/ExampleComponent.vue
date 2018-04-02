<template>

    <div class="form-group">
        <select2 :options="managements" v-model="@input="GetDepartments">                    
        </select2>
    </div>
    <div class="form-group">
        <select2 :options="departments" v-model="Department">                        
        </select2>
    </div>
                
</template>

<script>
                
    import axios from 'axios';
    import VueAxios from 'vue-axios';
    Vue.use(VueAxios, axios);

    export default
    {
        mounted()
        {
            Vue.axios.get('GetManagements')
            .then((responde)=>
            {
                this.managements = response.data;
            })
        },

        data: function ()
        {
            return
            {
                Management: '0',
                Department: '0',
                managements: [],
                departments: [],

            }
        },

        methods:
        {
            getDepartments()
            {
                Vue.axios.get('GetDepartments/'+this.Management)
                .then((response)=>
                {
                    this.departments = response.data;
                })
            }
        }
    }
</script>