<template>
<v-container
    id="dashboard"
    fluid
    tag="section"
  >

    <!-- text field -->
      <v-row>

        <v-row>
                <v-col
                cols="6"
                sm="6"
                md="6"
              >
                <v-text-field
                  label="Outlined"
                  outlined
                ></v-text-field>
              </v-col>

              <!-- search -->
              <v-col
              cols="6"
              sm="2"
              md="2"
              >
                  <v-btn
                  class="mx-2"
                  fab
                  dark
                  large
                  color="cyan"
                  >
                      <v-icon dark>
                            mdi-pencil
                      </v-icon>
                  </v-btn>
              </v-col>

        </v-row>
        

      <!-- `select field -->
            <v-row>
              <v-col
              class="d-flex"
              cols="6"
              sm="6"
              md="6"
              pl="1"
            >
                    <v-select
                      :items="selectBoxItems"
                      label="Outlined style"
                      outlined
                    ></v-select>
              </v-col>
      
            </v-row>
      
     
    </v-row>

      
  </v-container>
</template>

<script>
  export default {
    data: () => ({
     selectBoxItems: ['Foo', 'Bar', 'Fizz', 'Buzz'],
    }),
  }
</script>

