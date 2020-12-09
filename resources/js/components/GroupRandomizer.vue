<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div> <h1>Group Randomizer</h1> </div>
                    <!-- NAV PILLS -->
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" :class="{'active': current_step == 1}" href="#" @click.prevent="goToStep(1)">Add Coders Taking Part</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :class="{'active': current_step == 2, 'disabled': max_step < 2}" href="#" @click.prevent="goToStep(2)">How many groups</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :class="{'active': current_step == 3, 'disabled': max_step < 3}" href="#" @click.prevent="goToStep(3)">Get a Kata</a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <!-- TAB 1 -->
                        <div class="tab-content border-0">
                            <!-- DYNAMIC ADDING INPUTS (FORM CODERS)-->
                            <div class="row g-2" v-for="(input, key) in inputs" :key="key">
                                <div class="col-md">
                                    <label for="floatingInputValue">Coder name</label>
                                    <input type="text" class="form-control" id="floatingInputValue" placeholder="Martin Fowler" v-model="input.name">
                                </div>
                                <div class="col-md">
                                    <label for="floatingInputValue">Coder name</label>
                                    <input type="text" class="form-control" id="floatingInputValue" placeholder="python,java,php,typescript" v-model="input.languages">
                                </div>
                                <div class="col-md">
                                    <label for="btns">Add/remove coder</label>
                                    <span id="btns" style="display:block">
                                        <a class="btn" @click="addCoder(key)" v-show="key == inputs.length-1">
                                            <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="green" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                            </svg>
                                        </a>
                                        <a class="btn" click="removeCoder(key)" v-show="key || ( !key && inputs.length > 1)">
                                            <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                            </svg>
                                        </a>
                                    </span> 
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB 2 -->
                        <div class="tab-content border-0">
                            <!-- FORM GROUPS -->
                            <div class="row g-2" v-for="(input, key) in inputs" :key="key">
                                <div class="col-md">
                                    <label for="floatingInputValue">Coder name</label>
                                    <input type="text" class="form-control" id="floatingInputValue" placeholder="Martin Fowler" v-model="input.name">
                                </div>
                                <div class="col-md">
                                    <label for="floatingInputValue">Coder name</label>
                                    <input type="text" class="form-control" id="floatingInputValue" placeholder="python,java,php,typescript" v-model="input.languages">
                                </div>
                                <div class="col-md">
                                    <label for="btns">Add/remove coder</label>
                                    <span id="btns" style="display:block">
                                        <a class="btn" @click="addCoder(key)" v-show="key == inputs.length-1">
                                            <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="green" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                            </svg>
                                        </a>
                                        <a class="btn" click="removeCoder(key)" v-show="key || ( !key && inputs.length > 1)">
                                            <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                            </svg>
                                        </a>
                                    </span> 
                                </div>
                            </div>
                        </div>
                        
                        {{kata.name}}
                    </div>
                    <button class="btn btn-primary" @click.prevent="nextStep()">
                        {{current_step == 3 ?' Make Groups' : 'Next'}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'GroupRandomizer',
        components: {},
        data() {
            return {
                current_step: 1,
                max_step: 1,
                inputs: [
                    {
                        name: '',
                        languages: []
                    }
                ],
                kata: {}
            }
        },

        methods: {
            addCoder(key) {
                this.inputs.push({name: '', languages: ''});
            },

            removeCoder(key) {
                this.inputs.splice(key, 1);
            },

            nextStep() {
                if(this.current_step == 3)
                {
                    return
                }
                this.current_step++;
                this.max_step++;
            },

            goToStep(step) {
                this.current_step = step;
            },

            getRandomKata() {
                axios.get('/api/random-kata').then(response => {
                    this.kata = response.data;
                });
            }
        },

        mounted() {
            this.getRandomKata();
        }
    }
</script>
