<template>
    <div>
        <Navbar/>
         <section class='mx-2'>
                   <v-carousel
                        cycle
                        height="600"
                        hide-delimiter-background
                        show-arrows-on-hover
                        
                      >
                        <v-carousel-item
                        v-for="(slide, i) in slides"
                        :key="i"
                        >
                        <v-sheet
                            :color="colors[i]"
                            height="100%"
                        >
                            <v-row
                            class="fill-height"
                            align="center"
                            justify="center"
                            >
                            <div class="display-3 mx-5">
                                {{ slide }} Slide
                            </div>
                            </v-row>
                        </v-sheet>
                        </v-carousel-item>
                    </v-carousel>
                

                </section>

        <section>
            <h1>Services</h1>
        </section>
        <footer>
            <Footer/>
        </footer>
    </div>
</template>

<script>
import Navbar from './navbar'
import Footer from './footer'
export default {

    components:{Navbar,Footer},

     data () {
      return {
        colors: [
          'indigo',
          'warning',
          'pink darken-2',
          'red lighten-1',
          'deep-purple accent-4',
        ],
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
      }
    },
    
}
</script>

<style scoped>

</style>