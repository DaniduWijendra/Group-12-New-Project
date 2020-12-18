<template>

<v-layout row wrap>
    <v-flex xs12>
  <v-carousel :show-arrows="false" height="auto" cycle>
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.icon"
    ></v-carousel-item>
  </v-carousel>
    </v-flex> 
</v-layout>

</template>
<script>
  export default {
    data () {
      return {
        items: [
          {
            icon:require('@/assets/img/home/newone.png'),
              //src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg',
          },
          {
            icon:require('@/assets/img/home/webhome.png'),
          },
          {
            icon:require('@/assets/img/home/webimg2.png'),
          },
        ],
      }
    },
  }
</script>