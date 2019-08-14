<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateUser">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="User.name">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" v-model="User.age">
                    </div>
                    <div class="form-group">
                        <label>Hours Worked</label>
                        <input type="text" class="form-control" v-model="User.hours_worked">
                    </div>
                    <div class="form-group">
                        <label>Technology</label>
                        <input type="text" class="form-control" v-model="User.technology">
                    </div>
                    <div class="form-group">
                        <label>Period First At</label>
                        <input type="text" class="form-control" v-model="User.period_first_at">
                    </div>
                    <div class="form-group">
                        <label>Period Second At</label>
                        <input type="text" class="form-control" v-model="User.period_second_at">
                    </div>
                    <div class="form-group">
                        <label>Expected To End</label>
                        <input type="text" class="form-control" v-model="User.expected_to_end">
                    </div>
                    <div class="form-group">
                        <label>Parts Tracking</label>
                        <input type="text" class="form-control" v-model="User.parts_tracking">
                    </div>
                    
                    <div class="form-group">
                        <label>Manager period 2</label>
                        <input type="text" class="form-control" v-model="User.manager_period_2">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Trainning State</label>
                        <select class="form-control" v-model="User.trainning_state">
                        <option value="waiting_for_introductory_training">waiting_for_introductory_training</option>
                        <option value="wait_for_the_project_review">wait_for_the_project_review</option>
                        <option value="wait_for_the_general_interview">wait_for_the_general_interview</option>
                        <option value="waiting_for_join_team">waiting_for_join_team</option>
                        <option value="waiting_to_consider_being_a_collaborator">waiting_to_consider_being_a_collaborator</option>
                        <option value="finish">finish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Learning State</label>
                        <input type="text" class="form-control" v-model="User.learning_state">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                User: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/users/${this.$route.params.id}`)
                .then((response) => {
                    this.User = response.data;
                });
        },
        methods: {
            updateUser() {
                if(typeof this.User.learning_state == "string") this.User.learning_state = this.User.learning_state.split(',')
                
                this.axios
                    .put(`http://localhost/api/users/${this.$route.params.id}`, this.User)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                        let toast = this.$toasted.show("Updated User", { 
                            theme: "bubble", 
                            position: "top-right", 
                            duration : 5000
                        });
                    })
                    .catch(err => {
                        let errors = Object.assign({}, err.response.data);
                        let errorsMes = ''
                        Object.keys(errors).forEach(function(k){
                            errorsMes += `Error: ${errors[k][0]} </br>`;
                        });
                        let toast = this.$toasted.show(errorsMes, { 
                            theme: "bubble", 
                            position: "top-right", 
                            duration : 5000
                        });
                    })
                    
            }
        }
    }
</script>
