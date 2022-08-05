<template>
    <div>
    <template v-if="loading">
      <div class="loadingdesign loadingclass"> </div>
    </template>

    <template v-else>
        <ListPackages 
        :packages="folder.package"
        :folder="folder" 
        :emoji="folder"
        :name="folder.name"
        :showEdit="false"
         > </ListPackages>

    </template>
    </div>
</template>

<script>
import ListPackages from '../packages/ListPackages'
    export default {
        data() {
            return {
                user: '',
                folder: '',
                loading: true,
            }
        },

        components:{
            ListPackages,
        },

        methods: {
            getUser(){
                axios.get('/api/users').then(response => {
                    this.user = response.data
                    })
                    .catch(error => {
                        return this.$router.push('../404')
                    });
            },

            getFolder(){
                axios.get('/api/folders/'+this.$route.params.id).then(response => {
                this.folder = response.data
                console.log(this.folder);

                this.loading = false;
            })
             .catch(error => {
                return this.$router.push('../404');
            });
            }
        },
        
        mounted() {
            this.getUser();
            this.getFolder();
        },
    }
</script>

<style lang="scss" scoped>

</style>