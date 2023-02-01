package exercise;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class TabbedPaneDemo extends JFrame implements ActionListener{
	
	JTextField tambah_a,tambah_b;
	JLabel result_tambah,lbl1;
	JButton btncalculate_tambah;
	
	JTextField tolak_a,tolak_b;
	JLabel result_tolak,lbl2;
	JButton btncalculate_tolak;
	
	JTextField bahagi_a,bahagi_b;
	JLabel result_bahagi,lbl3;
	JButton btncalculate_bahagi;
	
	JTextField darab_a,darab_b;
	JLabel result_darab,lbl4;
	JButton btncalculate_darab;
	
	public TabbedPaneDemo()
	{
		super("DemoTabPane"); // set frame title
		
		JPanel ptambah = new JPanel();
		JPanel ptolak = new JPanel();
		JPanel pbahagi = new JPanel();
		JPanel pdarab = new JPanel();
		
		JTabbedPane tp = new JTabbedPane(); // create tabbedpane object
		
		tp.add("tambah nilai(+)",ptambah);
		tp.add("tolak nilai(-)",ptolak);
		tp.add("bahagi nilai(/)",pbahagi);
		tp.add("darab nilai(*)",pdarab);
		
		JLabel ltambah = new JLabel("tambah nilai");
		JLabel ltolak = new JLabel("tolak nilai");
		JLabel lbahagi = new JLabel("bahgi nilai");
		JLabel ldarab = new JLabel("darab nilai");
		
		add(tp);
		
		ptambah.add(ltambah);
		ptolak.add(ltolak);
		pbahagi.add(lbahagi);
		pdarab.add(ldarab);
		
		tambah_a = new JTextField(10);
		tambah_b = new JTextField(10);
		 btncalculate_tambah = new JButton("calculate");
		 result_tambah = new JLabel(" = ");
		 lbl1 = new JLabel(" + ");
		btncalculate_tambah.addActionListener(this);
		
		ptambah.add(tambah_a);
		ptambah.add(lbl1);
		ptambah.add(tambah_b);
		ptambah.add(result_tambah);
		ptambah.add(btncalculate_tambah);
		
		tolak_a = new JTextField(10);
		tolak_b = new JTextField(10);
		 btncalculate_tolak = new JButton("calculate");
		 result_tolak = new JLabel(" = ");
		 lbl2 = new JLabel(" - ");
		btncalculate_tolak.addActionListener(this);
		
		ptolak.add(tolak_a);
		ptolak.add(lbl2);
		ptolak.add(tolak_b);
		ptolak.add(result_tolak);
		ptolak.add(btncalculate_tolak);
		
		
		bahagi_a = new JTextField(10);
		bahagi_b = new JTextField(10);
		 btncalculate_bahagi = new JButton("calculate");
		 result_bahagi = new JLabel(" = ");
		 lbl3 = new JLabel(" / ");
		btncalculate_bahagi.addActionListener(this);
		
		pbahagi.add(bahagi_a);
		pbahagi.add(lbl3);
		pbahagi.add(bahagi_b);
		pbahagi.add(result_bahagi);
		pbahagi.add(btncalculate_bahagi);
		
		darab_a = new JTextField(10);
		darab_b = new JTextField(10);
		 btncalculate_darab = new JButton("calculate");
		 result_darab = new JLabel(" = ");
		 lbl4 = new JLabel(" / ");
		btncalculate_darab.addActionListener(this);
		
		pdarab.add(darab_a);
		pdarab.add(lbl4);
		pdarab.add(darab_b);
		pdarab.add(result_darab);
		pdarab.add(btncalculate_darab);
		
		
		
		
	}//end constructor
	
	
	public void actionPerformed(ActionEvent e)
	{
		double no1;
		double no2;
		double result;
		
		if(tambah_a.getText() != "")
		{
			 no1 = Integer.parseInt(tambah_a.getText());
			 no2 = Integer.parseInt(tambah_b.getText());
			 result = no1 + no2;
			result_tambah.setText(" = "+result);
			
		}// end condition
		
		if(tolak_a.getText() != "")
		{
			 no1 = Integer.parseInt(tolak_a.getText());
			 no2 = Integer.parseInt(tolak_b.getText());
			 result = no1 - no2;
			result_tolak.setText(" = "+result);
			
		}// end condition
		
		if(bahagi_a.getText() != "")
		{
			 no1 = Integer.parseInt(bahagi_a.getText());
			 no2 = Integer.parseInt(bahagi_b.getText());
			 result = no1 / no2;
			result_bahagi.setText(" = "+result);
			
		}// end condition
		
		if(darab_a.getText() != "")
		{
			 no1 = Integer.parseInt(darab_a.getText());
			 no2 = Integer.parseInt(darab_b.getText());
			 result = no1 * no2;
			result_darab.setText(" = "+result);
			
		}// end condition

	}

	public static void main(String args[])
	{
		TabbedPaneDemo DTP = new TabbedPaneDemo();
		
		
		
		DTP.setVisible(true);
		DTP.setSize(400, 300);
		DTP.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
	}//end main method

}
