<template>
    <div class="container">
        <h1 class="mb-4"> Katas </h1>
        <div class="input-group search-s mb-4">
            <input class="form-control my-0 py-1 amber-border search-s" type="text" placeholder="Search kata..." aria-label="Search" v-model="search">
        </div>

        <div class="kata-list">
            <div class="card kata-card" style="width: 18rem;" v-bind:key="i" v-for="(kata, i) in filteredKatas">
                <img class="card-img-top" src="/images/background-light.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{kata.name}}</h5>
                    <p class="card-text">{{(kata.description).slice(0, 150)}}...</p>
                    <a :href="'/katas/' + kata.id" class="btn btn-primary float-right">Read more</a>
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
                search: '',
            }
        },
        methods: {
            getKatas() {
                axios.get('/api/katas').then(response => {
                    this.kataList = response.data;
                });
            },
        },
        computed: {
            filteredKatas() {
                return this.kataList.filter((kata) => {
                    return kata.name.toLowerCase().match(this.search.toLowerCase());
                });
            },
        },
        mounted() {
            this.getKatas();
        },
    }

</script>

<style scoped>
    .kata-list {
    max-height: 70vh;
    display: grid;
    grid-template-columns: repeat(auto-fill, 350px);
    grid-gap: 20px;
}

    .kata-card {
    max-width: 350px;
    border-radius: 15px 15px 10px 10px;
}
</style>
