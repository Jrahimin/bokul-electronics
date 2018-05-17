<html>

<head>
	<meta charset = "UTF-8"/>
	<title>কিস্তিতে পণ্য ক্রয় করার আবেদনপত্র </title>
	<link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
	<link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
	<style>
		*{margin:0;padding:0;}body {font-family: 'Bangla', Arial, sans-serif !important;}
		.wrapper{width:96%;height:auto;border-radius:8px;margin:0 auto;position:relative;}
		.heading{padding:2px;font-size:0.9em;}
		td{font-size:0.9em;padding:1px;} .para{font-size:0.9em;}
	</style>
</head>

<body>

<br/>

<div class="wrapper">
	<img src="{{asset('sing.jpg')}}" style="border:solid 2px black;height:150px;"/>

	<div style="width:70%;position:absolute;top:20px;left:15%;margin:0 auto;">
		<p style="font-size:1.2em;font-weight:bold;text-align:center;">সিঙ্গার বাংলাদেশ লিমিটেড </p>
		<p style="font-size:0.9em;text-decoration:underline;text-align:center;">কিস্তিতে পণ্য ক্রয়ের আবেদনপত্র </p>
	</div>

	<p style="position:absolute;top:50px;width:130px;text-align:center;">
		তিন (৩) কপি<br/>পাসপোর্ট সাইজ<br/>ছবি
	</p>


	<table width="100%">

		<tr>
			<td width="24%">
				<p class="heading">আবেদনকারীর নাম  </p>
			</td>

			<td width="34%">
				{{$detail->name}}
			</td>

			<td width="15%">
				<p class="heading">ডাকনাম  </p>
			</td>

			<td>
				{{$detail->nickName}}
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">পিতা/স্বামীর নাম  </p>
			</td>

			<td colspan="3">
				{{$detail->fatherName}}
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">বর্তমান বাসস্থানের ঠিকানা </p>
			</td>

			<td colspan="3">
				{{$detail->presentAddress}}
			</td>
		</tr>

		<tr>
			<td width="24%">
				<p class="heading">বাসস্থান চেনার সহজ উপায়  </p>
			</td>

			<td>
				{{$detail->homeWay}}
			</td>

			<td>
				<p class="heading">টেলিফোন নং   </p>
			</td>

			<td>
				{{$detail->presentAddPhone}}
			</td>
		</tr>

		<tr>
			<td width="24%">
				<p class="heading">বাসস্থানটি নিজস্ব/ভাড়া  </p>
			</td>

			<td>
				{{$detail->OwnOrRent}}
			</td>

			<td width="15%">
				<p class="heading">বসবাসের সময়কাল</p>
			</td>

			<td>
				{{$detail->timeLiving}} &nbsp;বৎসর
			</td>
		</tr>

		<tr>
			<td width="24%">
				<p class="heading">পরিবারের সদস্য সংখ্যা  </p>
			</td>

			<td colspan="3">
				{{$detail->familyMemberNo}}&nbsp; জন
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">স্থায়ী ঠিকানা</p>
			</td>

			<td colspan="3">
				{{$detail->permanentAddress}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">টেলিফোন নং</p>
			</td>

			<td colspan="3">
				{{$detail->permanentAddressPhone}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">পেশা </p>
			</td>

			<td>
				{{$detail->occupation}}
			</td>

			<td>
				<p class="heading">মাসিক আয়  </p>
			</td>

			<td>
				{{$detail->monthlyIncome}}
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">বয়স </p>
			</td>

			<td>
				{{$detail->age}}
			</td>

			<td>
				<p class="heading">বৈবাহিক অবস্থা  </p>
			</td>

			<td>
				{{$detail->maritalStatus}}
			</td>
		</tr>

		<tr>
			<td colspan="4">
				<p class="heading"><br/>ক্রয় ইচ্ছুক পণ্যের বিবরণ : </p>
			</td>
		</tr>

		<tr>
			<td width="24%">
				<p class="heading">পণ্যের নাম  </p>
			</td>

			<td colspan="3">
				{{$detail->product}}&nbsp;
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">নগদ মূল্য </p>
			</td>

			<td>
				{{$detail->cashPrice}}
			</td>

			<td>
				<p class="heading">কিস্তি মূল্য   </p>
			</td>

			<td>
				{{$detail->InstallmentPrice}}
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">প্রারম্ভিক জমা </p>
			</td>

			<td>
				{{$detail->downPayment}}
			</td>

			<td>
				<p class="heading">মাসিক কিস্তি  </p>
			</td>

			<td>
				{{$detail->monthlyInstallment}}
			</td>
		</tr>

		<tr>
			<td colspan="4">
				<p class="heading"><br/>দুইজন ব্যক্তির নাম ও ঠিকানা যাহারা গ্যারান্টর/জামিনদার হইতে সম্মত হইয়াছেন  : </p>
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading"><br/>প্রথম জামিনদারের নাম </p>
			</td>

			<td><br/>
				{{$detail->firstPersonName}}
			</td><br/>

			<td><br/>
				<p class="heading">পিতা/স্বামীর নাম   </p>
			</td>

			<td><br/>
				{{$detail->firstPersonFatherName}}
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">বর্তমান ঠিকানা</p>
			</td>

			<td colspan="3">
				{{$detail->firstPersonPresent}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">টেলিফোন নং</p>
			</td>

			<td colspan="3">
				{{$detail->firstPersonPresentPhone}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">কর্মস্থলের ঠিকানা</p>
			</td>

			<td colspan="3">
				{{$detail->firstPersonJob}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">টেলিফোন নং</p>
			</td>

			<td colspan="3">
				{{$detail->firstPersonJobPhone}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading"><br/>দ্বিতীয় জামিনদারের নাম </p>
			</td>

			<td><br/>
				{{$detail->secondPersonName}}
			</td>

			<td><br/>
				<p class="heading">পিতা/স্বামীর নাম   </p>
			</td>

			<td><br/>
				{{$detail->secondPersonFatherName}}
			</td>
		</tr>

		<tr>
			<td>
				<p class="heading">বর্তমান ঠিকানা</p>
			</td>

			<td colspan="3">
				{{$detail->secondPersonPresent}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">টেলিফোন নং</p>
			</td>

			<td colspan="3">
				{{$detail->secondPersonPresentPhone}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">কর্মস্থলের ঠিকানা</p>
			</td>

			<td colspan="3">
				{{$detail->secondPersonJob}}
			</td>

		</tr>

		<tr>
			<td>
				<p class="heading">টেলিফোন নং</p>
			</td>

			<td colspan="3">
				{{$detail->secondPersonJobPhone}}
			</td>

		</tr>

	</table>

	<br/>

	<p style="font-size:1em;font-weight:bold;text-decoration:underline;text-align:center;">
		গ্যারান্টর/জামিনদারগণের অঙ্গীকারনামা
	</p>


	<p class="para" style="font-size:0.8em;padding:5px;text-align:justify;">

		আমি/আমরা উপরিল্লিখিত ব্যক্তিবর্গ এই আবেদনপত্রের উভয় পৃষ্ঠায় বর্ণিত ও প্রদত্ত সকল তথ্য অবগত হইয়া স্বেচ্ছায় ও স্বজ্ঞানে গ্যারান্টর/জামিনদার হইতে সম্মত হইলাম এবং সেই এই মর্মে অঙ্গীকার করিতেছি যে আবেদনকারী কিস্তিতে যে পণ্যটি ক্রয়ের জন্য আবেদন করিয়াছেন, তাহার নিকট পণ্যটি কিস্তিতে বিক্রয়/প্রদান করা হইলে যদি ঐ পণ্যটির মূল্য মাসিক কিস্তিতে নিয়মিতভাবে এবং যথাসময়ে পরিশোধে ব্যর্থ হয় সেক্ষেত্রে আমি/আমরা উহার অপরিশোধিত মূল্য পরিশোধ করিতে অথবা পণ্যটি ফেরত দেয়ার ব্যবস্থা করিতে আইনত বাধ্য থাকিব।

	</p>

	<table width="100%">

		<tr>
			<td width="50%">
				<p class="para" style="text-align:left;">
					. . . . . . . . . . . . . . . . . . . . . . . . . . . . .
					<br/><b>১ম জামিনদারের স্বাক্ষর </b>
					<br/><br/>
					তারিখঃ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
					<br/><br/>
					উপরোল্লিখিত তথ্য সঠিক ও স্বজ্ঞানে প্রদান করিলাম।
					<br/><br/>
					. . . . . . . . . . . . . . . . . . . . . . . . . . . . .
					<br/><b>আবেদনকারীর স্বাক্ষর </b>
					<br/><br/>
					তারিখঃ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
					<br/><br/>
				</p>
			</td>

			<td width="50%">
				<p class="para" style="text-align:right;">
					. . . . . . . . . . . . . . . . . . . . . . . . . . . . .
					<br/><b>২য় জামিনদারের স্বাক্ষর </b>
					<br/><br/>
					তারিখঃ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
					<br/><br/>
					আবেদনকারীর দেয়া তথ্য যাচাই করিয়া সঠিক প্রমাণিত হইল।
					<br/><br/>
					. . . . . . . . . . . . . . . . . . . . . . . . . . . . .
					<br/><b>ব্রাঞ্চ/শপ ম্যানেজার/সেলস এজেন্ট এর স্বাক্ষর </b>
					<br/><br/>
					তারিখঃ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
					<br/><br/>
				</p>
			</td>
		</tr>

	</table>

	<br/>
	<button type="submit" name="pdf" id="pdf" onclick="prints();" style="margin-left: 630px;">Create Pdf</button>
</div>

</body>

</html>

<script type="text/javascript">
	function prints() {
		document.getElementById("pdf").style.display="none";
		window.print();
	}
</script>