/*
 * Created by SharpDevelop.
 * User: IRU-RA1
 * Date: 06/06/2016
 * Time: 4:17 PM
 * 
 * To change this template use Tools | Options | Coding | Edit Standard Headers.
 */
using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;

namespace CryptoNotesGUI
{
	/// <summary>
	/// Description of MainForm.
	/// </summary>
	public partial class MainForm : Form
	{
		public MainForm()
		{
			//
			// The InitializeComponent() call is required for Windows Forms designer support.
			//
			InitializeComponent();
			
			//
			// TODO: Add constructor code after the InitializeComponent() call.
			//
		}
		void MainFormLoad(object sender, EventArgs e)
		{
			webBrowser1.Navigate("http://notes.svbook.com/");
		}
		
		void MainFormResize(object sender, EventArgs e)
		{
			if (WindowState == FormWindowState.Minimized)
        	{
            	this.Hide();
        	}
		}
		
		void NotifyIcon1Click(object sender, EventArgs e)
		{
			this.Show();
        	this.WindowState = FormWindowState.Normal;
		}
		
		void NotifyIcon1MouseClick(object sender, MouseEventArgs e)
		{
	
		}
	}
}
