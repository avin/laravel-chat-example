import React from "react";
import Reflux from "reflux";
import Messages from "./Messages";
import MessageComposer from "./MessageComposer";
import ChatStore from "../stores/ChatStore";

export default React.createClass({
    mixins: [Reflux.connect(ChatStore, "data")],

    render(){
        let sendMessageForm;
        if (this.state.data.user){
            sendMessageForm = (
                <MessageComposer />
            )
        } else {
            sendMessageForm = (
                <a href="/auth/login">Login to send message!</a>
            )
        }
        return (
            <div>
                <Messages messages={this.state.data.messages}/>
                {sendMessageForm}
            </div>
        )
    }
})