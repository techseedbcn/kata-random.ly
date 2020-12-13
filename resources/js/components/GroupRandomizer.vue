<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div> <h1>Group Randomizer</h1> </div>
                    <!-- NAV PILLS -->
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" :class="{'active': current_step == 1}" href="#" @click.prevent="goToStep(1)">Step 1: Adding Coders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :class="{'active': current_step == 2, 'disabled': max_step < 2}" href="#" @click.prevent="goToStep(2)">Step 2: Form the Groups</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :class="{'active': current_step == 3, 'disabled': max_step < 3}" href="#" @click.prevent="goToStep(3)">Step 3: Get a Kata</a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <!-- TAB 1: ADDING PARTICIPANTS -->
                        <div class="tab-content border-0">
                            <div v-show="current_step==1">
                                <p> 
                                    <strong>Add all the coders taking part in the kata, and their preferred programming languages</strong>
                                </p>
                                <!-- DYNAMIC ADDING INPUTS (FORM CODERS)-->
                                <div class="row" v-for="(input, key) in inputs" :key="key">
                                
                                    <div class="col-md">
                                        <label for="floatingInputValue">Coder name</label>
                                        <input type="text" class="form-control" id="floatingInputValue" placeholder="Martin Fowler" v-model="input.name">
                                    </div>
                                    <div class="col-md">
                                        <label for="floatingInputValue">Preferred Languages</label>
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
                                            <a class="btn" @click="removeCoder(key)" v-show="key || ( !key && inputs.length > 1)">
                                                <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                                </svg>
                                            </a>
                                        </span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- TAB 2: FORMING THE GROUPS -->
                        <div class="tab-content border-0">
                            <div v-show="current_step==2">
                                <p> 
                                    <strong>Select the number of groups you'd like to form OR the the size of the groups. We'll do the rest</strong>
                                </p>
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label for="number-of-froups">Number of Groups</label>
                                        <input type="number" class="form-control" id="floatingInputValue" placeholder="3">
                                    </div>
                                    <div class="col-md">
                                        <label for="group-size">Number of Groups</label>
                                        <input type="number" class="form-control"  id="floatingInputValue" placeholder="2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3: GET A RANDOM KATA -->
                        <div class="tab-content border-0">
                            <div v-show="current_step==3">
                                 <p> 
                                    <strong>Do you already have a kata to work on?</strong>
                                </p>
                                <div class="row g-2" >
                                    <div class="col-md">
                                        <label for="level-select">Select the difficulty level of your kata</label>
                                        <select id="level-select" class="form-select" aria-label="Default select example">
                                            <option value="1">Youngling</option>
                                            <option value="2">Padawan</option>
                                            <option value="3">Jedi Knight</option>
                                            <option value="3">Jedi Master</option>
                                        </select>
                                    </div>
                                    <div class="col-md">
                                        <label for="topic-select">Do you want to target a specific topic/skill?</label>
                                        <select v-model="selected_skill" id="topic-select" class="form-select" aria-label="Default select example">
                                            <option v-for="(skill, key) in skills" :key="key" :model="skill">{{ skill.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
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
                kata: {},
                skills: [],
                selected_skill: {}
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
                    this.randomizeGroups();
                    return;
                }
                this.current_step++;
                this.max_step++;
            },

            randomizeGroups() {
                alert('This should trigger')
            },

            goToStep(step) {
                this.current_step = step;
            },

            getRandomKata() {
                axios.get('/api/random-kata').then(response => {
                    this.kata = response.data;
                });
            },

            getSkills() {
                axios.get('/api/skills').then(response => {
                    this.skills = response.data;
                });
            }
        },

        mounted() {
            this.getRandomKata();
            this.getSkills();
        }
    }
</script>
