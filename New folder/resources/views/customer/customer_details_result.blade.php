<html>

	<head>
		<meta charset = "UTF-8"/>
		<title>কিস্তিতে পণ্য ক্রয় করার আবেদনপত্র </title>
		<style>
			*{margin:0;padding:0;}
			.wrapper{width:96%;height:auto;border-radius:8px;margin:0 auto;position:relative;}
			.heading{padding:2px;font-size:0.94em;font-weight:bold;}
			td{font-size:0.94em;padding:1px;} .para{font-size:0.94em;}
		</style>
	</head>
	
	<body>		

		<br/>
		
		<div class="wrapper">	
				<img src="{{asset('sing.jpg')}}" width="18%" height="22%;" style="border:solid 2px black;"/>

				<div style="width:70%;position:absolute;top:20px;left:15%;margin:0 auto;">
					<p style="font-size:1.2em;font-weight:bold;text-align:center;">সিঙ্গার বাংলাদেশ লিমিটেড </p>
					<p style="font-size:0.9em;text-decoration:underline;text-align:center;">কিস্তিতে পণ্য ক্রয়ের আবেদনপত্র </p>
				</div>
				
				<p style="position:absolute;top:50px;width:20%;text-align:center;">
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
										{{$detail->installmentPrice}}
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