import React from "react";
import Reflux from "reflux";
import App from "./components/App"
import io from 'socket.io-client'
import ChatActions from './actions/ChatActions'

//Socket handlers
var socket = io('http://chat.site.dev:6001');
socket.on('message', function(data) {
    //Convert input data to object
    data = JSON.parse(data);
    let message = _.get(data, 'data.message');
    if (! _.isEmpty(message)){
        //Add message if it's not our
        if (_.get(message, 'user.id') !== _.get(app, 'user.id')){
            ChatActions.addMessage(message);
        }
    }

});

React.render(
    <App />,
    document.getElementById('App')
);
