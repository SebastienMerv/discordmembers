<script setup>
import { onMounted } from 'vue';
import { ref } from 'vue';
import UserCard from '@/components/UserCard.vue';



const URL = import.meta.env.VITE_DISCORD_URL;

const discordServer = ref({});

onMounted(async () => {
  const response = await fetch(URL);
  const data = await response.json();
  // Si discod répond que les widget sont désactivés
  console.log(data)
  if (data.code === 50004) {
    window.alert('Les widgets sont désactivés sur ce serveur')
  }
  discordServer.value = data;
  document.title = data.name;
});
</script>

<template>
  <section>
    <h1>{{ discordServer.name }}</h1>
    <div class="grid">
      <UserCard v-for="user in discordServer.members" :key="user.id" :user="user" />
    </div>
  </section>
</template>

<style scoped>
section h1 {
  font-family: 'Arial';
  display: flex;
  justify-content: center;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 20px;
  padding: 20px;
}
</style>
