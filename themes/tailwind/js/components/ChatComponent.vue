<template>
<div> 
    <div class="flex flex-col justify-end h-80">
        <div ref="messageContainer" class="p-4 overflow-y-auto max-h-fit">
            <div
                v-for="message in messages"
                :key="message.id"
                class="flex items-center mb-2"
            >
                <div
                    v-if="message.sender_id === currentUser.id"
                    class="p-2 mr-auto bg-gray-200 rounded-lg"
                >
                    {{ message.text }}
                </div>  
                <div v-else class="p-2 mr-auto bg-gray-200 rounded-lg">
                    {{ message.text }}
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="flex items-center">
    <input
        type="text"
        v-model="newMesage"
        @keydown="sendTypingEvent"
        @keyup.enter="sendMessage"
        placeholder="Type a message...."
        class="flex-1 px-2 py-1 border rounded-lg"
    >
    <button
    @click="sendMessage"
    class="px-4 py-1 ml-2 text-white bblue-500 ounded-lg"
    >
    Send
    </button>
</div>

 