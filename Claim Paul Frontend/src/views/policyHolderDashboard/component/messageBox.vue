
<template>

<base-material-card title="Message Box" color="blue" height="435px">
  <v-row>

      <v-col
          cols="6"
        >
          <v-text-field
          v-if="active"
            label="Name"
            outlined
            class="mt-4 mx-3"
            
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
        >
        <v-textarea
        v-if="active"
          filled
          auto-grow
          label="Message"
          rows="4"
          row-height="30"
          shaped
          class="mx-3"
        ></v-textarea>
        </v-col>
        
    <v-col
      cols="12"
    >
            <v-text-field
                    v-if="active"
                    v-model="message"
                    :append-icon="marker ? 'mdi-map-marker' : 'mdi-map-marker-off'"
                    :append-outer-icon="message ? 'mdi-send' : 'mdi-microphone'"
                    :prepend-icon="icon"
                    filled
                    clear-icon="mdi-close-circle"
                    clearable
                    label="Message"
                    type="text"
                    @click:append="toggleMarker"
                    @click:append-outer="sendMessage"
                    @click:prepend="changeIcon"
                    @click:clear="clearMessage"
                
                ></v-text-field>

                <div 
                class="message-caller"
                 @click="change"
                 v-bind:class="{'active':active}"></div>
    </v-col>
  </v-row>
</base-material-card>
</template>

<script>
  export default {
    data: () => ({
      password: 'Password',
      show: false,
      message: 'Hey!',
      marker: true,
      iconIndex: 0,
      icons: [
        'mdi-emoticon',
        'mdi-emoticon-cool',
        'mdi-emoticon-dead',
        'mdi-emoticon-excited',
        'mdi-emoticon-happy',
        'mdi-emoticon-neutral',
        'mdi-emoticon-sad',
        'mdi-emoticon-tongue',
      ],

      active: false
    }),

    computed: {
      icon () {
        return this.icons[this.iconIndex]
      },
    },

    methods: {
      toggleMarker () {
        this.marker = !this.marker
      },
      sendMessage () {
        this.resetIcon()
        this.clearMessage()
      },
      clearMessage () {
        this.message = ''
      },
      resetIcon () {
        this.iconIndex = 0
      },
      changeIcon () {
        this.iconIndex === this.icons.length - 1
          ? this.iconIndex = 0
          : this.iconIndex++
      },

      change(){
      this.active = !this.active
    }
    },
  }
</script>

<style lang="sass">


  .message-caller
    
    margin-left:700px
    height: 80px
    width: 80px
    background: #039BE5
    border-radius: 50%
    box-shadow: 2px 4px 3px  rgba(0,0,0,.2)
    position: relative
    cursor: pointer
    border: 1px solid white
    &:after
      content: ''
      background: #039BE5
      height: 0
      width: 0
      position: absolute
      border-radius: 4px
      transition: all ease .3s
    &:before
      content: ''
      background: #039BE5
      height: 100%
      width: 100%
      position: absolute
      border-radius: 4px
      transition: all ease .3s
      border-radius: 50%
      z-index: 100
    &.active:after
      height: 30px
      width: 30px
      border: 1px solid white
      
    
    
   

</style>

