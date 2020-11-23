<template>
    <div class="container">
       <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">USERS</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="addModal">Add new <i class="fa fa-user-plus fa-fw"></i> </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Registered at</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr v-for="user in users" :key="user.id">
                      <td>{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.type | toUpper}}</td>
                      <td>{{user.created_at | the_date }}</td>
                      
                      <td>
                          <a href="#" @click="editModal(user)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          <a href="#" @click="deleteUser(user.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="editmode" class="modal-title" id="addNewLabel">Update User</h5>
                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
            <form @submit.prevent="editmode ? updateUser() : createUser()" >
                <div class="modal-body">
    
                    <div class="form-group">
                        <input v-model="form.name" type="text" name="name"
                        placeholder="Full Name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.email" type="text" name="email"
                            placeholder="Email Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                    <div class="form-group">
                        <textarea v-model="form.bio" type="text" name="bio" id="bio"
                            placeholder="Short bio (optional)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                        </textarea>
                        <has-error :form="form" field="bio"></has-error>
                    </div>

                    <div class="form-group">
                        <select v-model="form.type" type="text" name="type" id="type"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">Standard User</option>
                            <option value="author">Author</option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.password" type="password" name="password"
                        placeholder="Password"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" v-show="editmode" class="btn btn-primary">Update</button>
                    <button type="submit" v-show="!editmode" class="btn btn-primary">Create</button>
                </div>
            </form>
                </div>
            </div>
            </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                editmode: false,
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                })
            }
        },
         methods: {
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
                .then(()=>{
                    $("#addNew").modal("hide");
                    Swal.fire(
                        'Updated!',
                        'User info updated successfully.',
                        'success'
                    )
                    Fire.$emit("tableChanged");
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                    Swal.fire(
                        'Failed!',
                        'We encountered an issue!',
                        'warning'
                    )
                })
            },
            addModal(){
                this.editmode = false;
                this.form.reset();
                $("#addNew").modal("show");
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                this.form.clear();
                $("#addNew").modal("show");
                this.form.fill(user);
            },
            deleteUser(id){            
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        //send delete request to server
                        this.$Progress.start();
                        this.form.delete('api/user/'+id).then((result) => {
                            //notify user of successful delete
                            Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                            )
                            Fire.$emit("tableChanged");
                            this.$Progress.finish();
                        }).catch(()=>{
                            this.$Progress.fail();
                            Swal.fire(
                            'Failed!',
                            'We encountered an issue!',
                            'warning'
                            )
                            
                            
                        });
                    }
                })
            },

            loadUsers(){
                axios.get("api/user").then(({data}) => (this.users = data.data));
            },

            createUser () {
                this.$Progress.start();
                this.form.post('api/user')
                .then(()=>{
                    Fire.$emit("tableChanged");
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: 'success',
                        title: 'User created successfully'
                    });
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                });
            }
        },
        created() {
            this.loadUsers();
            Fire.$on('tableChanged', ()=> {
                this.loadUsers();
            });
            // setInterval(()=> this.loadUsers(), 3000);
        }
    }
</script>
