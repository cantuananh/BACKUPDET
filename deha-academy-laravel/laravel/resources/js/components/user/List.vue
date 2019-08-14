<template>
    <div>
        <h3 class="text-center">All User</h3><br/>
        <router-link :to="{name: 'add'}" class="btn btn-primary">
            Create User
        </router-link>
        <br/>
        <br/>
        <div class="row" style="padding-bottom:10px">
            
            <select class="form-control col-md-4" v-model="currentFilter.trainning_state">
                <option value="">Trainning state</option>
                <option value="waiting_for_introductory_training">Waiting for introductory training</option>
                <option value="wait_for_the_project_review">Wait for the project review</option>
                <option value="wait_for_the_general_interview">Wait for the general interview</option>
                <option value="waiting_for_join_team">Waiting for join team</option>
                <option value="waiting_to_consider_being_a_collaborator">Waiting to consider being a collaborator</option>
                <option value="finish">Finish</option>
            </select>
            &nbsp;&nbsp;
            <div>
                <input type="text" v-model="currentFilter.learning_state">
            </div>
            <button v-on:click="filter" class="btn btn-primary col-md-1">Filter</button>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Trainning state</th>
                    <th>Learning state</th>
                    <th>Period first at</th>
                    <th>Period second at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.trainning_state }}</td>
                    <td>{{ user.learning_state }}</td>
                    <td>{{ user.period_first_at }}</td>
                    <td>{{ user.period_second_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteuser(user.id)">Delete</button>
                        </div>
                    </td>
                </tr>
                </tbody>
                <pagination :data="users" :currentFilter="currentFilter" @pagination-change-page="getResults" align="center"></pagination>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentPage :1,
                currentFilter: {
                    trainning_state: '',
                    learning_state: ''
                },
                users: {}
            }
        },
        mounted() {
            // Fetch initial results
            this.getResults();
        },
        methods: {
            deleteuser(id) {
                this.axios
                    .delete(`http://localhost/api/users/${id}`)
                    .then(response => {
                        let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                        this.users.splice(i, 1)
                        let toast = this.$toasted.show("deleted User", { 
                            theme: "outline", 
                            position: "top-right", 
                            duration : 2000
                        });
                    })
                    .catch(err =>{
                        let toast = this.$toasted.show("Cannot delete User", { 
                            theme: "outline", 
                            position: "top-right", 
                            duration : 2000
                        });
                    })
            },
            getResults(page = 1, currentFilter = this.currentFilter) {
                let uri = `http://localhost/api/users?page=${page}&trainning_state=${currentFilter.trainning_state !== undefined ? currentFilter.trainning_state : ''}&learning_state=${currentFilter.learning_state !== undefined ? currentFilter.learning_state : ''}`;
                axios.get(uri)
                .then(response => {
                    this.users = response.data;
                    this.currentPage = page
                });
            },
            filter(){
                this.getResults(this.currentPage, this.currentFilter);

            }
        }
    }
</script>
