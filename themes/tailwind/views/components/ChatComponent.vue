<template>
    <div>
        <div class="flex flex-col justify-end h-80">
            <div ref="messageContainer" class="p-a overflow-y-auto max-h-fit">
                <div v-for="message in messages" :key="message.id" class="flex items-center mb-2">
                    <div v-if="message.sender_id === currentUser.id"
                        class="p-2 ml-auto text-white bg-blue-500 rounded-lg">
                        {{ message.text }}
                    </div>
                    <div v-else class="p-2 mr-auto gb-gray rounded-lg">
                        {{ message.text }}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center">
            <input type="text" v-model="NewMessage" @keydown="sendTypingEvent" @keyup.ender="SendMessage" placeholder=
            "Type a message..
            " class="flex-1 px-2 py-1 border rounded-lg"/>
                <button @click="SendMessage" class="px-4 py-1 ml-2 text-while bg-blue-500 rounded-lg"> send </button>
            </div>
            <div>
                <small v-if="isFriendTyping" class="text-gray-700">{{ friend.name }} is typing</small>
            </div>
    </div>
</template>
