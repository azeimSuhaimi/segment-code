
import java.awt.*;
import javax.swing.*;
import java.awt.event.*;

public class ConvertLength extends JFrame implements ActionListener
{
	
	private JLabel title, lbl1,lbl2,result;
	private JTextField tf1,tf2;
	private JButton btn;
	
	public ConvertLength()
	{
		super("Convert To CM");
		
		title = new JLabel("Please Enter length in Feet and inches :");
		lbl1 = new JLabel("FEET :");
		lbl2 = new JLabel("INCHES :");
		result = new JLabel("AFTER CONVERSION :");
		
		tf1 = new JTextField(8);
		tf2 = new JTextField(8);
		
		btn = new JButton("CONVERT TO CM");
		btn.addActionListener(this);
		
		JPanel p = new JPanel();
		
		add(title,BorderLayout.NORTH);
		add(p,BorderLayout.CENTER);
		add(result,BorderLayout.SOUTH);
		
		p.add(lbl1);
		p.add(tf1);
		p.add(lbl2);
		p.add(tf2);
		p.add(btn);
		
	}
	
	public void actionPerformed(ActionEvent e)
	{
		float text1 = Float.parseFloat(tf1.getText());
		float text2 =  Float.parseFloat(tf2.getText());
		double anwser1 = 0;
		double anwser2 = 0;
		
		/*
		if()
		{
			anwser1 = text1 / 0.032808;
			result.setText("AFTER CONVERSION : feet to cm "+ anwser1);
		}
		
		if()
		{
			anwser2 = text2 / 0.39370;
			result.setText("AFTER CONVERSION : inches to cm "+ anwser2);
		}
		if()
		{
			anwser1 = text1 / 0.032808;
			anwser2 = text2 / 0.39370;
			result.setText("AFTER CONVERSION : feet to cm "+ anwser1+ "  | inches to cm "+ anwser2);
		}
		
		
			*/
		
		
		
		
		
		
	}
	
	
	public static void main(String args[])
	{
		ConvertLength cl = new ConvertLength();
		
		cl.setVisible(true);
		cl.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		cl.setSize(500, 200);
		cl.setLocationRelativeTo(null);
	}
}
