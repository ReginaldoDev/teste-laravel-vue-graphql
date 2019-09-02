<template>
  <div>
    <form action="#" method="POST" @submit.prevent="editBook">
      <div>
        <label>Title</label>:
        <input type="text" name="title" id="title" v-model="title" />
      </div>
      <div>
        <label>Author</label>:
        <input type="text" name="author" id="author" v-model="author" />
      </div>
      <div>
        <label>Image</label>:
        <input type="text" name="image" id="image" v-model="image" />
      </div>
      <div>
        <label>Description</label>:
        <input type="text" name="description" id="description" v-model="description" />
      </div>
      <div>
        <label>Link</label>:
        <input type="text" name="link" id="link" v-model="link" />
      </div>
      <div>
        <label>
          <input type="checkbox" name="featured" v-model="featured" /> Featured
        </label>
      </div>
      <div>
        <label>Category</label>
        <ApolloQuery :query="require('@/graphql/queries/Categories.gql')">
          <!-- The result will automatically updated -->
          <template slot-scope="{ result: { data, loading }, isLoading }">
            <!-- Some content -->
            <div v-if="isLoading">Loading...</div>
            <select v-model="category_id" v-else>
              <option
                :value="category.id"
                v-for="category of data.categories"
                :key="category.id"
              >{{ category.name }}</option>
            </select>
          </template>
        </ApolloQuery>
      </div>

      <div>
        <button type="submit">Enviar</button>
      </div>
    </form>
  </div>
</template>

<script>
import updateBook from "@/graphql/mutations/UpdateBook.gql";
import book from "@/graphql/queries/Book.gql";

export default {
  data() {
    return {
      title: "",
      author: "",
      image: "",
      description: "",
      link: "",
      featured: false,
      category_id: 1,
      book: null
    }
  },
  apollo: {
    book: {
      query: book,
      variables() {
        if (this.$route && this.$route.params) {
          return {
            id: this.$route.params.id
          }
        }
      },
      result({ data, loading, networkStatus }) {
        this.title = data.book.title
        this.author = data.book.author
        this.image = data.book.image
        this.description = data.book.description
        this.link = data.book.link
        this.featured = data.book.featured
        this.category_id = data.book.category_id.id
      },
    },
  },
  methods: {
    editBook() {
      this.$apollo
        .mutate({
          // Query
          mutation: updateBook,
          // Parameters
          variables: {
            id: this.$route.params.id,
            title: this.title,
            author: this.author,
            image: this.image,
            link: this.link,
            description: this.description,
            featured: this.featured,
            category: this.category_id
          }
        })
        .then(data => {
          console.log(data);
          this.$router.push(`/books/${this.$route.params.id}`);
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>