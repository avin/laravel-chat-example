import Reflux from 'reflux';
import _ from 'lodash';
import request from 'superagent';
import ChatActions from '../actions/ChatActions';
import sizzle from 'sizzle';
import moment from 'moment';

export default Reflux.createStore({
    listenables: [ChatActions],

    //Send message to server
    onSendMessage(content){
        if (content && this.data.user){
            let user = this.data.user;
            let newMessage = {
                content: content,
                author: {
                    id: user.id,
                    name: user.name
                }
            };
            // If the new message is not like previous
            if (! _.isEqual(_.last(this.data.messages), newMessage)){

                //Send to server
                request
                    .post('/api/chat/send')
                    .send({message: newMessage})
                    .set('Accept', 'application/json')
                    .set('X-CSRF-TOKEN', sizzle('meta[name="csrf-token"]')[0].getAttribute("content"))
                    .end((err, res) => {
                        if (err) throw err;

                        let resObj = res.body;

                        if (resObj.flag) {
                            //console.log('message sent')
                        }
                    });

                //Add to messages array
                newMessage.createAt = moment().format("HH:mm");
                this.data.messages.push(newMessage);
                this.updateData();
            }
        }
    },

    //Send message to messages array
    onAddMessage(message){
        if (! _.isEmpty(message)){
            this.data.messages.push({
                content: message.content,
                author: {
                    id:  message.user.id,
                    name: message.user.name
                },
                createAt: moment(message.created_at).format("HH:mm")
            });
            this.updateData()
        }
    },

    //Load messages from server
    loadData(){
        request
            .get('/api/chat/get')
            .end((err, res) => {
                if (err) throw err;

                let resObj = res.body;

                if (resObj.flag) {

                    let messages = _.map(resObj.data, (message) => {
                        return {
                            content: message.content,
                            author: {
                                id:  message.user.id,
                                name: message.user.name
                            },
                            createAt: moment(message.created_at).format("HH:mm")
                        }
                    });
                    this.data.messages = this.data.messages.concat(messages);
                    this.updateData()
                }
            });
    },

    //Trigger update data
    updateData(){
        this.trigger(this.data);
    },

    //Init
    getInitialState: function () {
        this.loadData();

        this.data = {
            user: _.get(app, 'user'),
            options: {
                fixScroll: false
            },
            messages: []
        };
        return this.data;
    }
});