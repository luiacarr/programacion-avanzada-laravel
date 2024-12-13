<template>
    <div class="flex flex-col justify-end h-80">
        <div ref="messagesContainer" class="p-4 overflow-y-auto max-h-fit">
            <div v-for="message in messages"
            :key="message.id"

            class="flex items-center mb-2">
        
        
        </div v-if=" message.sender_id === currentUser.id"
        class="p-2 ml-auto text-white bg-blue-500 rounded -lg">
        

        {{message.text}}

            </div>

            <div v-else class="p-2 mr-auto bg-gray-200 rounded -lg">


                
            </div>

        
  
 
        
       
       







                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>