<template>
       <div class="popup-form" @keyup.enter="submitForm(name, input)">
            <div class="popup-form__inner">
                   <form class="delete-message" >
                       <input type="text" v-model="name" placeholder="Název složky...">
                  
                    <a class="closepopup" @click.prevent="closePopup()"> <i class="fas fa-times"></i></a>
            

    <emoji-picker @emoji="append">
           
      <div
        class=""
        slot="emoji-invoker"
        slot-scope="{ events: { click: clickEvent } }"
        @click.stop="clickEvent"
      >
        <input slot="emoji-invoker"  @click.stop="clickEvent" class="emoji-input" disabled="disabled"  v-model="input" placeholder="👆 Vyber emoji...">
      </div>
      <div slot="emoji-picker" slot-scope="{ emojis, insert, display }">
        <div class="emoji-picker" :style="{ top: display.y + 'px', left: display.x + 'px' }">
      
          <div>
            <h5> Vlajky států </h5>
          <span class="cursor-poninter" @click="insert('🇨🇿')"> 🇨🇿 </span> 
          <span class="cursor-poninter" @click="insert('🇬🇧')"> 🇬🇧 </span> 
          <span class="cursor-poninter" @click="insert('🇺🇲')"> 🇺🇲 </span> 
          <span class="cursor-poninter" @click="insert('🇩🇪')"> 🇩🇪 </span> 
          <span class="cursor-poninter" @click="insert('🇪🇸')"> 🇪🇸 </span> 
          <span class="cursor-poninter" @click="insert('🇺🇦')"> 🇺🇦 </span> 
          <span class="cursor-poninter" @click="insert('🇩🇰')"> 🇩🇰 </span> 
          <span class="cursor-poninter" @click="insert('🇵🇱')"> 🇵🇱 </span> 
          <span class="cursor-poninter" @click="insert('🇨🇳')"> 🇨🇳 </span> 
          <span class="cursor-poninter" @click="insert('🇫🇷')"> 🇫🇷 </span> 
          <span class="cursor-poninter" @click="insert('🇸🇪')"> 🇸🇪 </span> 
          <span class="cursor-poninter" @click="insert('🇦🇪')"> 🇦🇪 </span> 
          <span class="cursor-poninter" @click="insert('🇯🇵')"> 🇯🇵 </span> 
          <span class="cursor-poninter" @click="insert('🇺🇦🇷🇺')"> 🇷🇺 </span> 
           <h5> Nejpoužívanější</h5>
            <div v-for="(emojiGroup, category) in emojis" :key="category">
 

              
              <div class="emojis">
                <span
                
                  v-for="(emoji, emojiName) in emojiGroup"
                  :key="emojiName"
                  @click="insert(emoji)"
                  :title="emojiName"
                >{{ emoji }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </emoji-picker>


     <a @click.prevent="submitForm(name, input)" > <i class="far fa-save save-ico-pop"></i></a>
              </form>
            </div>

        </div>
</template>

<script>
import EmojiPicker from 'vue-emoji-picker'

export default {
   name: "ModalTemplate",

    data() {
        return {
            name: '',
            input: '',
        }
    },

methods: {
    append(emoji) {
        if(this.input != ''){
            this.input = '';
            this.input += emoji;
        }else{

            this.input += emoji
        }
    },
  

        submitForm(name, input) {
                let data = {
                    name: name,
                    emoji: input,
                    user_id: 1,
                    
                }
              
              axios.post('./api/folders', data).then(response => {
                       
                    if(response.status == 200){
                        this.$emit('folderchanged');

                        console.log(response.data);

                        this.closePopup();

                         this.name = '';
                         this.input = '';


                       }


                   });


            },

        closePopup(){
           this.$emit('closemodal');
        }

            },

   directives: {
    focus: {
      inserted(el) {
        el.focus()
      },
    },
  },

     components: {
    EmojiPicker,
  },

}
</script>