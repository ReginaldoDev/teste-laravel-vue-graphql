<template>
  <div class="addCategory">
    <form action="#" method="POST" @submit.prevent="addCategory">
      <div>
        <label>Name</label>:
        <input type="text" name="name" id="name" v-model="name" />
      </div>
      
      <div>
        <button type="submit">Enviar</button>
      </div>
    </form>
  </div>
</template>

<script>
import addCategory from '@/graphql/mutations/AddCategory.gql';

export default {
  data() {
    return {
      name: ''
    }
  },
  methods: {
    addCategory() {
      this.$apollo.mutate({
          // Query
          mutation: addCategory,
          // Parameters
          variables: {
            name: this.name
          }
        }).then(data => {
          console.log(data);
          this.$router.push('/');
        }).catch(error => {
          console.error(error);
        });
    }
  }
};
</script>