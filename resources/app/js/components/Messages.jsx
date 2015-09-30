import React from "react";
import md5 from "md5";

/**
 * CHeck if color is not so light
 * @param hexcolor
 * @returns {boolean}
 */
function isTooLightYIQ(hexcolor){
    var r = parseInt(hexcolor.substr(0,2),16);
    var g = parseInt(hexcolor.substr(2,2),16);
    var b = parseInt(hexcolor.substr(4,2),16);
    var yiq = ((r*299)+(g*587)+(b*114))/1000;
    return yiq >= 128;
}

/**
 * Generate not too light color by string
 * @param string
 * @returns {*}
 */
function color(string) {
    let colorStr = md5(string).slice(0, 6);
    if (isTooLightYIQ(colorStr)) {
        return color(colorStr)
    } else {
        return colorStr
    }
}

export default React.createClass({
    componentDidUpdate(){
        var textarea = React.findDOMNode(this);
        textarea.scrollTop = textarea.scrollHeight;
    },
    render(){

        var messages = _.map(this.props.messages, (message, key) => {
            return (
                <div key={key}>
                    <span className="text-muted">[{message.createAt}]</span> <strong style={{color: '#' + color(message.author.name)}}>{message.author.name}</strong>: {message.content}
                </div>
            );

        });
        return (
            <div className="well" style={{height: 400, overflow: "auto"}}>
                {messages}
            </div>
        )
    }
})