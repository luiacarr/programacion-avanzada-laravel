<template>
    <div>
        <div class="flex flex-col justify-end h-80">
            <div ref="messagesContainer" class="p-4 overflow-y-auto max-h-fit">
                <div v-for="message in messages":key="message.id" class="flex items-center mb-2">
                    <div v-if="message.sender_id === currentUser.id" class="p-2 ml-auto text-white bg-blue-500 rounded-lg">
                        {{ message.text }}
                    </div>
                    <div v-else class="p-2 mr-auto text-white bg-gray-200 rounded-lg">
                        {{ message.text }}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center">
            <input 
                type="text"
                v-model="newMessage"
                @keydown="sendTyingEvent"
                @keyup.enter="sendMessage"
                placeholder="Type a message..."
                class="flex-1 px-2 py-1 border rounded-lg"
            >
            <button @click="sendMessage" class="px-4 py-1 ml-2 text-white bg-blue-500 rounded-lg">send</button>
        </div>
        <small v-if="isFriendTyping" class="text-gray-700">
            {{ friend.name }} is typing...
        </small>
    </div>
</template>

