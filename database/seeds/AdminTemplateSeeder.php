<?php

use Illuminate\Database\Seeder;

class AdminTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->insert([
            'type' => 'creditor_registration',
            'subject' => 'Welcome to TDR',
            'body' => '<pre>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;TDR&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Hello :NAME &lt;/h1&gt;
    &lt;p&gt;
        Thanks for signing up with TDR! We have successfully setup your account based on your preferences.
    &lt;/p&gt;
    &lt;p&gt;
        Please find the credentials below to get started.
    &lt;/p&gt;
    &lt;div class=&quot;row&quot;&gt;
        &lt;table&gt;
            &lt;tr&gt;
                &lt;td&gt;Creditor Name:&lt;/td&gt;
                &lt;td&gt;:NAME &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Creditor ID:&lt;/td&gt;
                &lt;td&gt;:CREDITOR_ID &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Main user Username:&lt;/td&gt;
                &lt;td&gt;:CREDITOR_USERNAME &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Main user Password:&lt;/td&gt;
                &lt;td&gt; :CREDITOR_PASSWORD &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;User1 Username:&lt;/td&gt;
                &lt;td&gt;:USER1_USERNAME&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;User1 Password:&lt;/td&gt;
                &lt;td&gt;:USER1_PASSWORD&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;User2 Username:&lt;/td&gt;
                &lt;td&gt;:USER2_USERNAME&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;User2 Password:&lt;/td&gt;
                &lt;td&gt;:USER2_PASSWORD&lt;/td&gt;
            &lt;/tr&gt;&lt;/table&gt;&lt;/div&gt;&lt;p&gt;&lt;a href=&quot;:BASE_URL/creditor/login&quot;&gt;Login to Portal&lt;/a&gt;&lt;/p&gt;Thank you&lt;/body&gt;&lt;/html&gt;</pre>',
            'status' => 1,
        ]);
        DB::table('email_templates')->insert([
            'type' => 'notifier_registration',
            'subject' => 'Welcome to TDR',
            'body' => '',
            'status' => 1,
        ]);
        DB::table('email_templates')->insert([
            'type' => 'admin_forgotpassword',
            'subject' => 'Reset Password Notification',
            'body' => '<pre>Hello!</pre><p>You are receiving this email because we received a password reset request for your account.</p>
<p>&lt;a href=&quot;:URL&quot;&gt;Reset Password&lt;/a&gt;</p>
<p>This password reset link will expire in 60 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p><pre>Thank you</pre>',
            'status' => 1,
        ]);
        DB::table('email_templates')->insert([
            'type' => 'creditor_forgotpassword',
            'subject' => 'Reset Password Notification',
            'body' => '<pre>Hello!</pre><p>You are receiving this email because we received a password reset request for your account.</p>
<p>&lt;a href=&quot;:URL&quot;&gt;Reset Password&lt;/a&gt;</p>
<p>This password reset link will expire in 60 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p><pre>Thank you</pre>',
            'status' => 1,
        ]);
        DB::table('email_templates')->insert([
            'type' => 'notifier_forgotpassword',
            'subject' => 'Reset Password Notification',
            'body' => '<pre>Hello!</pre><p>You are receiving this email because we received a password reset request for your account.</p>
<p>&lt;a href=&quot;:URL&quot;&gt;Reset Password&lt;/a&gt;</p>
<p>This password reset link will expire in 60 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p><pre>Thank you</pre>',
            'status' => 1,
        ]);
        DB::table('email_templates')->insert([
            'type' => 'notifier_verification',
            'subject' => 'Verify Email Address',
            'body' => '<pre>Hello!</pre><p>Please click the button below to verify your email address.</p>
<p>&lt;a href=&quot;:URL&quot;&gt;Verify Email Address&lt;/a&gt;</p>
<p>If you did not create an account, no further action is required.</p>
<pre>Thank you</pre>',
            'status' => 1,
        ]);
    }
}
