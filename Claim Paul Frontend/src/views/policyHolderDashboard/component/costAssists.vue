<template>
  <v-card>
    <v-card-title class="headline font-weight-regular blue-grey white--text">
      Get Informations
    </v-card-title>
    <v-card-text>
      <v-subheader class="pa-0">
        Where do you live?
      </v-subheader>
      <v-autocomplete
        v-model="model"
        :hint="!isEditing ? 'Click the icon to edit' : 'Click the icon to save'"
        :items="states"
        :readonly="!isEditing"
        :label="`State — ${isEditing ? 'Editable' : 'Readonly'}`"
        persistent-hint
        prepend-icon="mdi-city"
      >
        <template v-slot:append-outer>
          <v-slide-x-reverse-transition
            mode="out-in"
          >
            <v-icon
              :key="`icon-${isEditing}`"
              :color="isEditing ? 'success' : 'info'"
              @click="isEditing = !isEditing"
              v-text="isEditing ? 'mdi-check-outline' : 'mdi-circle-edit-outline'"
            ></v-icon>
          </v-slide-x-reverse-transition>
        </template>
      </v-autocomplete>
    </v-card-text>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        isEditing: false,
        model: null,
        states: [
          'Ampara',
          'Anuradhapura'	,
         ' Badulla'	,
          'Batticaloa'	,
          'Colombo	',
          'Galle'	,
         ' Gampaha'	,
          'Hambantota'	,
          'Jaffna'	,
          'Kalutara'	,
         ' Kandy	',
         ' Kegalle	',
          'Kilinoc',
          'Kurunegala',
         ' Mannar',
          'Matale	',
         ' Matara	',
          'Moneragala'	,
          'Mullaitivu',
          'Nuwara Eliya'	,
          'Polonnaruwa'	,
         ' Puttalam'	,
         ' Ratnapura'	,
         ' Trincomalee	',
          'Vavuniya'
        ],
      }
    },
  }
</script>