<template>
    <div class="container">
        <!-- <div v-bind:key="i" v-for="(kata, i) in kataList">
            <div class="card-alumni-s">
                <div class="card-head-s">
                    <h3>
                        {{kata.name}}
                    </h3>
                    <div class="card-icons">
                        <!-- <a :href="'/empleos/' + jobOffer.id"><i class="fas fa-info button-s"></i></a> -->
                   <!--  </div>
                </div>
                <hr>
                <div class="card-main-s">
                    <p> {{(kata.description).slice(0, 150)}}... </p>
                    <div class="card-dates-s">
                    <p> <b>Level:  </b>{{kata.level}} </p>
                    <p> <b>Source:  </b>{{kata.source}} </p>
                    </div>
                </div>
                <div class="card-foot-s">
                    <div class="tag-list-job-offer">
                        <p> hola </p>
                    </div>
                </div>
            </div>
        </div> -->
            <div class="course-list">
                <div class="card kata-card" style="width: 18rem;" v-bind:key="i" v-for="(kata, i) in kataList">
                    <img class="card-img-top" src="./background-light.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{kata.name}}</h5>
                    <p class="card-text">{{(kata.description).slice(0, 150)}}...</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">{{kata.level}}</small>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        name: 'kata',
        components: {},
        data() {
            return {
                kataList: [],
            }
        },
        methods: {
            getKatas() {
                axios.get('/api/katas').then(response => {
                    this.kataList = response.data;
                });
            },
        },
        mounted() {
            this.getKatas();
        }
    }
</script>

<style scoped>
    .course-list {
    max-height: 70vh;
    /* overflow-y: scroll; */
    display: grid;
    grid-template-columns: repeat(auto-fill, 350px);
    grid-gap: 20px;
}

    .kata-card {
    max-width: 350px;
    border-radius: 15px 15px 10px 10px;
}
</style>
