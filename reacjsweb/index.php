<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Hello World</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
	<script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
  </head>
  <body>
    <div id="root"></div>
    <script type="text/babel">
		class HelloMessage extends React.Component {
			constructor(props) {
				super(props);
				this.state = { items: [], text: '' };
				this.handleChange = this.handleChange.bind(this);
				this.handleSubmit = this.handleSubmit.bind(this);
			}
			
			handleChange(e) {
				console.log(e);
				this.setState({ text: e.target.value });
			}

			handleSubmit(e) {
				e.preventDefault();
				if (!this.state.text.length) {
				  return;
				}
				const newItem = {
				  text: this.state.text,
				  id: Date.now()
				};
				this.setState(prevState => ({
				  items: prevState.items.concat(newItem),
				  text: ''
				}));
			}
			
			handelEdit(e){
				console.log('Edit Parent')
			}
			
			handleRemove(e){
				this.state.text = e.text;
				//this.render();
				console.log(this.state)
			}
			  
			render() {
				return (
				  <div>
					<form onSubmit={this.handleSubmit}>
						<div className="form-group">
							<label labelName="firstname" className="firstname">Name</label><br/>
							<input ref={name} onChange={this.handleChange} type="text" name="firstname" value={this.state.text}/>
							<button> Add # #{this.state.items.length + 1}</button>
						</div>
					</form>
					<h3>TODO</h3>
					<TodoList items={this.state.items} remove={this.handleRemove.bind(this)} />
				  </div>
				);
			}
		}
		
		class TodoList extends React.Component {
			
			
			constructor(props) {
				super(props);
				
			};
			
			handelEdit(item){
				console.log(this.props);
				//this.handelEdit(e);
				this.props.remove(item)
			}
			
			render() {
				console.log(this);
				return (
				  <ul>
					{this.props.items.map(item => (
					  <li key={item.id}><a onClick={() => {this.handelEdit(item)}} href="#">{item.text}</a></li>
					))}
				  </ul>
				);
			}
		}

	
      ReactDOM.render(
		<HelloMessage/>,
        document.getElementById('root')
      );

    </script>
    <!--
      Note: this page is a great way to try React but it's not suitable for production.
      It slowly compiles JSX with Babel in the browser and uses a large development build of React.

      To set up a production-ready React build environment, follow these instructions:
      * https://reactjs.org/docs/add-react-to-a-new-app.html
      * https://reactjs.org/docs/add-react-to-an-existing-app.html

      You can also use React without JSX, in which case you can remove Babel:
      * https://reactjs.org/docs/react-without-jsx.html
      * https://reactjs.org/docs/cdn-links.html
    -->
  </body>
</html>