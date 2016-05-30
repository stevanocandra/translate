<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#selectlang').change(function(){
					var token = $('#token').val();
					var selectlang = $('#selectlang').val();
					var quote = '{{Inspiring::quote()}}';
					$.ajax({
						type:'GET',
						url:'{{action("WelcomeController@indexTranslate")}}',
						data: {token:token, selectlang:selectlang, quote:quote}
					}).success(function(data){
						var obj = jQuery.parseJSON(data);
						if (obj.err == false){
							document.getElementById('quote').innerHTML = obj.data;
						}
						else{
							document.getElementById('quote').innerHTML = 'Error';
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header right">
					
					<input type="hidden" name="token" id="token" value="{{csrf_token()}}"/>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="content">
				<div class="title">Laravel 5</div>
				<div class="quote" id="quote">{{ Inspiring::quote() }}</div><br/>
				<select id="selectlang" name="selectlang">
					<option value="af">Afrikanns</option>
					<option value="sq">Albanian</option>
					<option value="ar">Arabic</option>
					<option value="az">Azerbaijani</option>
					<option value="eu">Basque</option>
					<option value="bn">Bengali</option>
					<option value="be">Belarusian</option>
					<option value="bg">Bulgarian</option>
					<option value="ca">Catalan</option>
					<option value="zh-CN">Chinese Simplified</option>
					<option value="zh-TW">Chinese Traditional</option>
					<option value="hr">Croatian</option>
					<option value="cs">Czech</option>
					<option value="da">Danish</option>
					<option value="nl">Dutch</option>
					<option value="en">English</option>
					<option value="eo">Esperanto</option>
					<option value="et">Estonian</option>
					<option value="tl">Filipino</option>
					<option value="fi">Finnish</option>
					<option value="fr">French</option>
					<option value="gl">Galician</option>
					<option value="ka">Georgian</option>
					<option value="de">German</option>
					<option value="el">Greek</option>
					<option value="gu">Gujarati</option>
					<option value="ht">Haitian Creole</option>
					<option value="id">Indonesian</option>
					<option value="ms">Malay</option>
					<option value="ja">Japanese</option>
					<option value="ko">Korean</option>
				</select>
			</div>
		</div>
	</body>
</html>
