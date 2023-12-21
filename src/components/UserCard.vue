<script setup>
// On déclare le props user qui doit être un objet
const props = defineProps({
    user: {
        type: Object,
        required: true
    }
})



</script>

<template>
    <div class="card">
        <img :src="props.user.avatar_url" alt="">
        <h1>{{ props.user.username }}</h1>
        <p v-if="props.user.game">Joue à {{ props.user.game.name }}</p>
        <h1 class="dnd" v-if="props.user.status == 'dnd'"><i class="fa-solid fa-ban"></i></h1>
    </div>
</template>

<style scoped>
.card {
    background-color: #dfe4ea;
    width: 200px;
    display: flex;
    justify-content: center;
    text-align: center;
    flex-direction: column;
    padding: 15px;
    align-items: center;
}

.card h1 {
    font-family: 'Arial';
    font-size: 1.5rem;
}

.card p {
    margin: 0px;
    font-family: 'Arial';
    /* Italic */
    font-style: italic;
}

.card .dnd {
    background-color: #ff4757;
    color: white;
    padding: 5px;
    /* Width ajustée à la taille */
    width: fit-content;
    border-radius: 100%;
}

.card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto;
}
</style>
