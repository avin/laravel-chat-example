import React from "react";
import _ from "lodash";
import ChatActions from "../actions/ChatActions";

export default React.createClass({
    getInitialState: function () {
        return {
            message: {
                content: ""
            }
        };
    },
    handleSendMessage(){
        //Send content to action
        let content = React.findDOMNode(this.refs.content).value;
        ChatActions.sendMessage(content);

        //Reset input
        React.findDOMNode(this.refs.content).value = '';

        //Set focus to input
        React.findDOMNode(this.refs.content).focus();
    },
    handleKeyDown(e){
        var ENTER = 13;
        if( e.keyCode == ENTER ) {
            this.handleSendMessage();
        }
    },
    render(){
        return (
            <div className="input-group">
                <input type="text" className="form-control" placeholder="..." maxLength="1024" ref="content" onKeyDown={this.handleKeyDown}/>
                  <span className="input-group-btn">
                    <button className="btn btn-default" type="button" onClick={this.handleSendMessage}>Send!</button>
                  </span>
            </div>
        )
    }
})