<template>
  <div class="home">
    <router-link to="/books/add">Adicionar</router-link>
    <!-- Apollo Query -->
    <ApolloQuery :query="categoriesQueryUser" :variables="{ id: this.me.id }">
      <!-- The result will automatically updated -->
      <template slot-scope="{ result: { data, loading }, isLoading }">
        <!-- Some content -->
        <div v-if="isLoading">Loading...</div>
        <div v-else>
          <a href="#" @click.prevent="selectCategory('all')" class="link-margin">All</a>
          <a href="#" @click.prevent="selectCategory('featured')" class="link-margin">Featured</a>
          <a
            href="#"
            v-for="category of data.buscaComplexQuery"
            :key="category.id"
            class="link-margin"
            @click.prevent="selectCategory(category.id)"
          >{{ category.category.id }}.{{ category.category.name }}</a>
        </div>
      </template>
    </ApolloQuery>

    <ApolloQuery :query="query" v-if="selectedCategory === 'all'">
      <!-- The result will automatically updated -->
      <template slot-scope="{ result: { data, loading }, isLoading }">
        <!-- Some content -->
        <div v-if="isLoading">Loading...</div>
        <div v-else>
          <div v-for="book of data.books" :key="book.id">
            <router-link :to="`/books/${book.id}`">{{ book.id }}.{{ book.title }}</router-link>
            <div>{{ book.author }}</div>
            <img :src="`${book.image}`" alt="cover image" />
          </div>
        </div>
      </template>
    </ApolloQuery>

    <ApolloQuery
      :query="query"
      :variables="{ featured: true}"
      v-else-if="selectedCategory === 'featured'"
    >
      <!-- The result will automatically updated -->
      <template slot-scope="{ result: { data, loading }, isLoading }">
        <!-- Some content -->
        <div v-if="isLoading">Loading...</div>
        <div v-else>
          <div v-for="book of data.booksByFeatured" :key="book.id">
            <router-link :to="`/books/${book.id}`">{{ book.id }}.{{ book.title }}</router-link>
          </div>
        </div>
      </template>
    </ApolloQuery>

    <ApolloQuery :query="query" :variables="{ id: selectedCategory}" v-else>
      <!-- The result will automatically updated -->
      <template slot-scope="{ result: { data, loading }, isLoading }">
        <!-- Some content -->
        <div v-if="isLoading">Loading...</div>
        <div v-else>
          <div v-for="book of data.category.books" :key="book.id">
            <router-link :to="`/books/${book.id}`">{{ book.id }}.{{ book.title }}</router-link>
          </div>
        </div>
      </template>
    </ApolloQuery>
  </div>
</template>

<script>
import categoryQuery from "@/graphql/queries/Category.gql";
import categoriesQuery from "@/graphql/queries/Categories.gql";
import booksQuery from "@/graphql/queries/Books.gql";
import booksFeaturedQuery from "@/graphql/queries/BooksFeatured.gql";
import categoriesQueryUser from "@/graphql/queries/CategoriesUser.gql";
import gql from "graphql-tag";

export default {
  name: "home",
  components: {},
  data() {
    return {
      categoriesQueryUser,
      categoryQuery,
      categoriesQuery,
      booksQuery,
      booksFeaturedQuery,
      selectedCategory: "all",
      query: booksQuery,
      categories: [],
      me: null
    };
  },
  methods: {
    selectCategory(category) {
      if (category === "all") {
        this.query = booksQuery;
      } else if (category === "featured") {
        this.query = booksFeaturedQuery;
      } else {
        this.query = categoryQuery;
      }

      this.selectedCategory = category;
    }
  },
  apollo: {
    me: gql`
      query {
        me {
          id
          name
          email
        }
      }
    `
  }
};
</script>
<style>
.link-margin {
  margin-right: 40px;
}
</style>